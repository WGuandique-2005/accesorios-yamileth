<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = \App\Models\Product::activos()->enStock()->get();
        return view('home', compact('products'));
    }
}
