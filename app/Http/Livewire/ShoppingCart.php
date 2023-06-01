<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ShoppingCart extends Component
{
    use LivewireAlert;
    public $products;
    public array $quantity = [];


    public function mount(){
        $this->products = Cart::content();
        foreach ($this->products as $product){
            $this->quantity[$product->id] = $product->qty;
        }
    }

    public function render()
    {
        $cartItems = Cart::content();
        $subTotal = Cart::subtotal();
        $tax = Cart::tax();
        $total = Cart::total();
        return view('livewire.shopping-cart',compact('cartItems','subTotal','tax','total'));
    }
    public function remove($rowId){
        Cart::remove($rowId);
        $this->emit('cart_updated');
        $this->alert('error', 'Product deleted!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);
    }
    public function changeQuantity($rowId,$id){
        Cart::update($rowId,$this->quantity[$id]);
        $this->emit('cart_updated');
        $this->alert('success', 'Quantity changed to ' . $this->quantity[$id] . '!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);
    }
}