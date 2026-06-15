<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $products = \App\Models\Product::activos()->enStock()->get();
        return view('welcome', compact('products'));
    }
}
