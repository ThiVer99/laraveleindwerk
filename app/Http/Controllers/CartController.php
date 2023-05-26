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
        return view("cart");
    }

    public function store(Request $request){
        $product = Product::findOrFail($request->input('product_id'));
        Cart::add(
            $product->id,
            $product->name,
            1,
            $product->price
        )->associate('App\Models\Product');

        return redirect()->back()->with('message','Successfully added!');
    }
}
