<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::withTrashed()->with(['productImages', 'batches.invoiceItem.invoice'])->latest()->get();

        return view('admin.inventario', [
            'products' => $products,
            'product' => null,
            'stats' => [
                'total' => Product::withTrashed()->count(),
                'active' => Product::where('activo', true)->count(),
                'no_stock' => Product::where('cantidad_stock', 0)->count(),
                'trashed' => Product::onlyTrashed()->count(),
            ],
        ]);
    }

    public function create()
    {
        return redirect()->route('admin.inventario.index');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['activo'] = $request->boolean('activo');
        $data['descuento'] = 0;
        $cantidadInicial = (int) $data['cantidad_stock'];
        $precioInicial = (float) $data['precio_inversion'];
        $data['cantidad_stock'] = 0;
        $data['precio_inversion'] = 0;

        DB::transaction(function () use ($request, $data, $cantidadInicial, $precioInicial) {
            $product = Product::create($data);
            $product->agregarLote($cantidadInicial, $precioInicial);

            $this->syncProductImages($product, $request);
        });

        return redirect()->route('admin.inventario.index')->with('success', 'Producto creado correctamente.');
    }

    public function edit(int $id)
    {
        $products = Product::withTrashed()->with(['productImages', 'batches.invoiceItem.invoice'])->latest()->get();
        $product = Product::withTrashed()->with(['productImages', 'batches.invoiceItem.invoice'])->findOrFail($id);

        return view('admin.inventario', [
            'products' => $products,
            'product' => $product,
            'stats' => [
                'total' => Product::withTrashed()->count(),
                'active' => Product::where('activo', true)->count(),
                'no_stock' => Product::where('cantidad_stock', 0)->count(),
                'trashed' => Product::onlyTrashed()->count(),
            ],
        ]);
    }

    public function update(Request $request, int $id)
    {
        $product = Product::withTrashed()->with(['productImages', 'batches.invoiceItem.invoice'])->findOrFail($id);
        $data = $this->validatedData($request);
        $data['activo'] = $request->boolean('activo');
        unset($data['cantidad_stock'], $data['precio_inversion']);

        DB::transaction(function () use ($request, $product, $data) {
            $product->update($data);

            $this->syncProductImages($product, $request);
        });

        return redirect()->route('admin.inventario.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(int $id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('admin.inventario.index')->with('success', 'Producto enviado a papelera.');
    }

    public function toggle(int $id)
    {
        $product = Product::findOrFail($id);
        $product->activo = ! $product->activo;
        $product->save();

        return response()->json([
            'success' => true,
            'activo' => $product->activo,
        ]);
    }

    public function reponerStock(Request $request, Product $product)
    {
        $data = $request->validate([
            'cantidad' => ['required', 'integer', 'min:1'],
            'costo_unitario' => ['required', 'numeric', 'min:0'],
            'precio_venta' => ['required', 'numeric', 'min:0'],
            'fecha_ingreso' => ['required', 'date'],
        ]);

        $batch = null;

        DB::transaction(function () use ($product, $data, &$batch) {
            $batch = $product->agregarLote(
                (int) $data['cantidad'],
                (float) $data['costo_unitario'],
                null,
                (float) $data['precio_venta']
            );

            $batch->update([
                'fecha_ingreso' => $data['fecha_ingreso'],
            ]);
        });

        return redirect()
            ->route('admin.inventario.index', ['batch_id' => $batch->id])
            ->with('success', "Stock repuesto correctamente. Lote #{$batch->id} creado.");
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'nombre' => ['required', 'string', 'max:150'],
            'cantidad_stock' => ['required', 'integer', 'min:0'],
            'precio_unitario' => ['required', 'numeric', 'min:0'],
            'precio_inversion' => ['required', 'numeric', 'min:0'],
            'activo' => ['nullable', 'boolean'],
            'imagen' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'imagenes' => ['nullable', 'array'],
            'imagenes.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);
    }

    private function syncProductImages(Product $product, Request $request): void
    {
        $orderedUploads = [];

        if ($request->hasFile('imagen')) {
            $orderedUploads[] = $request->file('imagen');
        }

        foreach ((array) $request->file('imagenes', []) as $image) {
            $orderedUploads[] = $image;
        }

        if (empty($orderedUploads)) {
            return;
        }

        $paths = [];

        foreach ($orderedUploads as $image) {
            $paths[] = $image->store('productos', 'public');
        }

        if ($request->hasFile('imagen') || ! $product->imagen_ruta) {
            $product->update(['imagen_ruta' => $paths[0]]);
        }

        foreach ($paths as $index => $path) {
            ProductImage::create([
                'product_id' => $product->id,
                'ruta' => $path,
                'orden' => $index + 1,
            ]);
        }
    }
}
