<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvoiceItem;
use App\Models\Product;
use App\Models\ProductBatch;
use App\Models\PurchaseInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = PurchaseInvoice::withCount('items')
            ->latest('fecha_compra')
            ->latest('id')
            ->paginate(12);

        return view('admin.facturas.index', compact('invoices'));
    }

    public function create()
    {
        $products = $this->availableProducts();
        $selectedBatch = null;

        if (request()->filled('batch_id')) {
            $selectedBatch = ProductBatch::with(['product' => fn ($query) => $query->withTrashed()])
                ->find(request('batch_id'));

            if (! $selectedBatch || $selectedBatch->invoiceItem) {
                $selectedBatch = null;
            }
        }

        return view('admin.facturas.create', compact('products', 'selectedBatch'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'numero_factura' => ['nullable', 'string', 'max:255'],
            'fecha_compra' => ['required', 'date'],
            'notas' => ['nullable', 'string'],
            'descuento_temu' => ['required', 'numeric', 'min:0'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.nombre_producto' => ['nullable', 'string', 'max:255'],
            'items.*.cantidad' => ['required', 'integer', 'min:1'],
            'items.*.precio_unitario_temu' => ['required', 'numeric', 'min:0'],
            'items.*.product_id' => ['nullable', 'exists:products,id'],
            'items.*.product_batch_id' => ['nullable', 'exists:product_batches,id'],
        ]);

        $normalizedItems = collect($data['items'])
            ->values()
            ->map(function (array $item, int $index) {
                $batch = null;

                if (filled($item['product_batch_id'] ?? null)) {
                    $batch = ProductBatch::with(['product' => fn ($query) => $query->withTrashed()])
                        ->findOrFail($item['product_batch_id']);

                    if (filled($item['product_id'] ?? null) && (int) $item['product_id'] !== (int) $batch->product_id) {
                        throw ValidationException::withMessages([
                            "items.$index.product_batch_id" => 'El lote seleccionado no pertenece al producto indicado.',
                        ]);
                    }

                    if ($batch->invoiceItem) {
                        throw ValidationException::withMessages([
                            "items.$index.product_batch_id" => 'El lote seleccionado ya fue facturado.',
                        ]);
                    }

                    $item['product_id'] = $batch->product_id;
                    $item['cantidad'] = (int) $batch->cantidad_inicial;
                    $item['precio_unitario_temu'] = (float) $batch->precio_inversion;
                }

                if (filled($item['product_id'] ?? null) && ! filled($item['product_batch_id'] ?? null)) {
                    throw ValidationException::withMessages([
                        "items.$index.product_batch_id" => 'Debes seleccionar un lote para este producto.',
                    ]);
                }

                return $item;
            });

        $batchIds = $normalizedItems
            ->pluck('product_batch_id')
            ->filter(fn ($batchId) => filled($batchId))
            ->map(fn ($batchId) => (int) $batchId)
            ->values();

        $productIds = $normalizedItems
            ->pluck('product_id')
            ->filter(fn ($productId) => filled($productId))
            ->map(fn ($productId) => (int) $productId)
            ->values();

        if ($batchIds->count() !== $batchIds->unique()->count()) {
            throw ValidationException::withMessages([
                'items' => 'No puedes repetir el mismo lote en la misma factura.',
            ]);
        }

        if ($productIds->count() !== $productIds->unique()->count()) {
            throw ValidationException::withMessages([
                'items' => 'No puedes repetir el mismo producto en la misma factura.',
            ]);
        }

        $totalInversion = round($normalizedItems->sum(fn (array $item) => (float) $item['cantidad'] * (float) $item['precio_unitario_temu']), 2);
        $totalCantidad = (int) $normalizedItems->sum('cantidad');
        $descuentoPorProducto = $totalCantidad > 0
            ? round((float) $data['descuento_temu'] / $totalCantidad, 2)
            : 0;

        DB::transaction(function () use ($data, $normalizedItems, $totalInversion, $descuentoPorProducto) {
            $invoice = PurchaseInvoice::create([
                'numero_factura' => $data['numero_factura'] ?? null,
                'fecha_compra' => $data['fecha_compra'],
                'total_inversion' => $totalInversion,
                'descuento_temu' => $data['descuento_temu'],
                'descuento_por_producto' => $descuentoPorProducto,
                'notas' => $data['notas'] ?? null,
            ]);

            foreach ($normalizedItems as $item) {
                $batch = ! empty($item['product_batch_id'])
                    ? ProductBatch::with(['product' => fn ($query) => $query->withTrashed()])
                        ->findOrFail($item['product_batch_id'])
                    : null;

                $product = $batch?->product ?? (! empty($item['product_id'])
                    ? Product::withTrashed()->findOrFail($item['product_id'])
                    : null);

                $nombreProducto = trim((string) ($item['nombre_producto'] ?? ''));
                if ($nombreProducto === '') {
                    $nombreProducto = $product?->nombre ?? 'Producto';
                }

                $subtotal = round((float) $item['cantidad'] * (float) $item['precio_unitario_temu'], 2);

                $invoiceItem = InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $product?->id,
                    'product_batch_id' => $batch?->id,
                    'nombre_producto' => $nombreProducto,
                    'cantidad' => $item['cantidad'],
                    'precio_unitario_temu' => $item['precio_unitario_temu'],
                    'subtotal' => $subtotal,
                ]);

                if ($batch) {
                    ProductBatch::query()
                        ->whereKey($batch->id)
                        ->update([
                        'invoice_item_id' => $invoiceItem->id,
                        ]);
                }
            }
        });

        return redirect()
            ->route('admin.facturas.index')
            ->with('success', 'Factura registrada correctamente.');
    }

    public function show(int $id)
    {
        $invoice = PurchaseInvoice::with(['items.productBatch', 'items.product.batches.invoiceItem.invoice'])->findOrFail($id);

        return view('admin.facturas.show', compact('invoice'));
    }

    public function destroy(int $id)
    {
        PurchaseInvoice::findOrFail($id)->delete();

        return redirect()
            ->route('admin.facturas.index')
            ->with('success', 'Factura eliminada correctamente.');
    }

    private function availableProducts()
    {
        return Product::withTrashed()
            ->whereHas('batches', fn ($query) => $query->whereDoesntHave('invoiceItem'))
            ->with([
                'batches' => fn ($query) => $query->whereDoesntHave('invoiceItem'),
                'productImages',
            ])
            ->orderBy('nombre')
            ->get();
    }
}
