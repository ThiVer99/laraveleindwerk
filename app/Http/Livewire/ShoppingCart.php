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
            $this->quantity[$product->id][$product->options->size->id] = $product->qty;
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
    public function changeQuantity($rowId,$id,$sizeId){
        $validatedQuantity = $this->validate([
            'quantity.' . $id .'.'. $sizeId=> ['required','integer', 'numeric'],
        ], [
            'quantity.' . $id .'.'. $sizeId . '.integer' => 'quantity cant be a decimal number',
            'quantity.' . $id .'.'. $sizeId . '.required' => 'quantity is required',
        ]);

        Cart::update($rowId, $validatedQuantity['quantity'][$id][$sizeId]);
        $this->emit('cart_updated');
        $this->alert('success', 'Quantity changed to ' . $validatedQuantity['quantity'][$id][$sizeId] . '!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);
    }
}
