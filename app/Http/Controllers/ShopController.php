<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function index()
    {
        return view("shop");
    }

    public function show(Product $product)
    {
        $cart = Cart::content();
        return view("shopItem", compact('product','cart'));
    }
}
