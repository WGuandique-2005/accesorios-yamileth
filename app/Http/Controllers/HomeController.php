<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('q', ''));
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $sort = $request->input('sort');
        $query = \App\Models\Product::query()
            ->with(['productImages', 'reviews'])
            ->activos()
            ->enStock()
            ->orderByDesc('created_at');

        if ($search !== '') {
            $query->whereRaw('LOWER(nombre) LIKE ?', ['%'.mb_strtolower($search).'%']);
        }

        $products = $query->get();

        if ($minPrice !== null && $minPrice !== '') {
            $products = $products->filter(fn ($product) => $product->precio_final >= (float) $minPrice);
        }

        if ($maxPrice !== null && $maxPrice !== '') {
            $products = $products->filter(fn ($product) => $product->precio_final <= (float) $maxPrice);
        }

        $products = match ($sort) {
            'price_asc' => $products->sortBy(fn ($product) => $product->precio_final)->values(),
            'price_desc' => $products->sortByDesc(fn ($product) => $product->precio_final)->values(),
            'newest' => $products->sortByDesc('created_at')->values(),
            default => $products->values(),
        };

        return view('home', [
            'products' => $products,
            'filters' => $request->only(['q', 'min_price', 'max_price', 'sort']),
        ]);
    }
}
