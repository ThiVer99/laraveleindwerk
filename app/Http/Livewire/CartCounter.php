<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartCounter extends Component
{
    protected $listeners = ['cart_updated' => 'render'];

    public function render()
    {
        $cartCount = Cart::content()->count();

        return view('livewire.cart-counter',compact('cartCount'));
    }
}
