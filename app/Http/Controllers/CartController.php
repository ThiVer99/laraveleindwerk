<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view("cart", compact('products'));
    }

    public function store(Request $request){
        $product = Product::findOrFail($request->input('product_id'));
        Cart::add(
            $product->id,
            $product->name,
            1,
            $product->price
        );

        return redirect()->back()->with('message','Successfully added!');
    }
}
