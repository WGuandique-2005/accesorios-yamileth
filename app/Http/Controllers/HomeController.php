<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Product::query()
            ->with(['productImages', 'reviews'])
            ->activos()
            ->enStock();

        if ($request->filled('q')) {
            $query->where('nombre', 'like', '%'.trim($request->string('q')).'%');
        }

        if ($request->filled('min_price')) {
            $query->whereRaw('(precio_unitario - descuento) >= ?', [$request->input('min_price')]);
        }

        if ($request->filled('max_price')) {
            $query->whereRaw('(precio_unitario - descuento) <= ?', [$request->input('max_price')]);
        }

        match ($request->input('sort')) {
            'price_asc' => $query->orderByRaw('(precio_unitario - descuento) asc'),
            'price_desc' => $query->orderByRaw('(precio_unitario - descuento) desc'),
            'newest' => $query->orderByDesc('created_at'),
            default => $query->orderByDesc('created_at'),
        };

        return view('home', [
            'products' => $query->get(),
            'filters' => $request->only(['q', 'min_price', 'max_price', 'sort']),
        ]);
    }
}
