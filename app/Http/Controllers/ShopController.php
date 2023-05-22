<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function index()
    {
        $products = Product::with('photo')->paginate(18);
        return view("shop", compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view("shopItem", compact('product'));
    }
}
