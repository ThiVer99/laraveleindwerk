<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view("cart", compact('products'));
    }

    public function checkout(){

    }
}
