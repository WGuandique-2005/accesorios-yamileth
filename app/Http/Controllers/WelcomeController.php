<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->intended('/home');
        }

        $products = \App\Models\Product::activos()->enStock()->with(['productImages', 'batches'])->get();

        return view('welcome', compact('products'));
    }
}
