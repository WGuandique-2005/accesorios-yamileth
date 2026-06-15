<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::withTrashed()->latest()->get();

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
        $data['descuento'] = $data['descuento'] ?? 0;
        $data['activo'] = $request->boolean('activo');

        if ($request->hasFile('imagen')) {
            $data['imagen_ruta'] = $request->file('imagen')->store('productos', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.inventario.index')->with('success', 'Producto creado correctamente.');
    }

    public function edit(int $id)
    {
        $products = Product::withTrashed()->latest()->get();
        $product = Product::withTrashed()->findOrFail($id);

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
        $product = Product::withTrashed()->findOrFail($id);
        $data = $this->validatedData($request);
        $data['descuento'] = $data['descuento'] ?? 0;
        $data['activo'] = $request->boolean('activo');

        if ($request->hasFile('imagen')) {
            if ($product->imagen_ruta) {
                Storage::disk('public')->delete($product->imagen_ruta);
            }

            $data['imagen_ruta'] = $request->file('imagen')->store('productos', 'public');
        }

        $product->update($data);

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

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'nombre' => ['required', 'string', 'max:150'],
            'cantidad_stock' => ['required', 'integer', 'min:0'],
            'precio_unitario' => ['required', 'numeric', 'min:0'],
            'precio_inversion' => ['required', 'numeric', 'min:0'],
            'descuento' => ['nullable', 'numeric', 'min:0', 'lte:precio_unitario'],
            'activo' => ['nullable', 'boolean'],
            'imagen' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);
    }
}
