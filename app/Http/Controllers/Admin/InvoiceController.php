<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvoiceItem;
use App\Models\Product;
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

        return view('admin.facturas.create', compact('products'));
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
        ]);

        $productIds = collect($data['items'])
            ->pluck('product_id')
            ->filter(fn ($productId) => filled($productId))
            ->map(fn ($productId) => (int) $productId)
            ->values();

        if ($productIds->count() !== $productIds->unique()->count()) {
            throw ValidationException::withMessages([
                'items' => 'No puedes repetir el mismo producto en la misma factura.',
            ]);
        }

        $availableProducts = $this->availableProducts()->keyBy('id');
        foreach ($data['items'] as $index => $item) {
            if (! empty($item['product_id']) && ! $availableProducts->has((int) $item['product_id'])) {
                throw ValidationException::withMessages([
                    "items.{$index}.product_id" => 'Ese producto ya fue incluido en una factura anterior.',
                ]);
            }
        }

        $items = collect($data['items'])->values();
        $totalInversion = round($items->sum(fn (array $item) => (float) $item['cantidad'] * (float) $item['precio_unitario_temu']), 2);
        $totalCantidad = (int) $items->sum('cantidad');
        $descuentoPorProducto = $totalCantidad > 0
            ? round((float) $data['descuento_temu'] / $totalCantidad, 2)
            : 0;

        DB::transaction(function () use ($data, $items, $totalInversion, $descuentoPorProducto) {
            $invoice = PurchaseInvoice::create([
                'numero_factura' => $data['numero_factura'] ?? null,
                'fecha_compra' => $data['fecha_compra'],
                'total_inversion' => $totalInversion,
                'descuento_temu' => $data['descuento_temu'],
                'descuento_por_producto' => $descuentoPorProducto,
                'notas' => $data['notas'] ?? null,
            ]);

            foreach ($items as $item) {
                $product = ! empty($item['product_id'])
                    ? Product::withTrashed()->find($item['product_id'])
                    : null;

                $nombreProducto = trim((string) ($item['nombre_producto'] ?? ''));
                if ($nombreProducto === '') {
                    $nombreProducto = $product?->nombre ?? 'Producto';
                }

                $subtotal = round((float) $item['cantidad'] * (float) $item['precio_unitario_temu'], 2);
                $costoUnitarioEfectivo = round((float) $item['precio_unitario_temu'] - $descuentoPorProducto, 2);

                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $product?->id,
                    'nombre_producto' => $nombreProducto,
                    'cantidad' => $item['cantidad'],
                    'precio_unitario_temu' => $item['precio_unitario_temu'],
                    'subtotal' => $subtotal,
                ]);

                if ($product) {
                    $product->update(['precio_inversion' => $costoUnitarioEfectivo]);
                }
            }
        });

        return redirect()
            ->route('admin.facturas.index')
            ->with('success', 'Factura registrada correctamente.');
    }

    public function show(int $id)
    {
        $invoice = PurchaseInvoice::with(['items.product'])->findOrFail($id);

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
            ->whereDoesntHave('invoiceItems')
            ->orderBy('nombre')
            ->get();
    }
}
