<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StoreController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return Inertia::render('Store/Index', [
            'products' => $products
        ]);
    }

    public function show(Product $product)
    {
        return Inertia::render('Store/Show', [
            'product' => $product->load('category')
        ]);
    }
}
