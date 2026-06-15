<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $query = Review::with(['user', 'product', 'orderItem.order'])->latest();

        if ($request->filled('rating')) {
            $query->where('rating', $request->integer('rating'));
        }

        if ($request->filled('product_id')) {
            $query->where('product_id', $request->integer('product_id'));
        }

        $reviews = $query->paginate(15)->withQueryString();
        $products = Product::orderBy('nombre')->get(['id', 'nombre']);

        return view('admin.resenas', compact('reviews', 'products'));
    }
}
