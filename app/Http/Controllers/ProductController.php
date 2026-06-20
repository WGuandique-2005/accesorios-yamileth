<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show(int $id)
    {
        $product = Product::activos()
            ->enStock()
            ->with(['productImages', 'reviews.user', 'batches'])
            ->find($id);

        if (! $product) {
            return redirect('/home')->with('error', 'Producto no disponible.');
        }

        return view('detalle_producto', compact('product'));
    }
}
