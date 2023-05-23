<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function index()
    {
        $products = Product::with('photo')->paginate(18);
        $brands = Brand::all();
        return view("shop", compact('products','brands'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view("shopItem", compact('product'));
    }
}
