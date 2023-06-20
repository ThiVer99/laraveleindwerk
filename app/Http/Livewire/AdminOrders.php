<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class AdminOrders extends Component
{
    public function render()
    {
        $orders = Order::with('user','address','products')->paginate(15);
        return view('livewire.admin-orders', compact('orders'));
    }


}
