<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Order;
use App\Models\Size;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index(){
        return view('admin.orders.index');
    }

    public function frontendIndex()
    {
        $orders = Order::where('user_id',Auth::id())->with('products','products.photo','products.colors')->get();
        $colors = Color::all();
        $sizes = Size::all();
        return view("orders" ,compact('orders','sizes','colors'));
    }

    public function show($id){
        $order = Order::findOrfail($id);
        $sizes = Size::all();
        return view('admin.orders.show',compact('order','sizes'));
    }
}
