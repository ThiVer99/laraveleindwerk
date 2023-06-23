<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductShow extends Component
{
    public $product;
    public $selectedSize;
    public $inCart;

    public function mount(){
        $this->selectedSize = $this->product->sizes->min('id');
        $this->sizeChange();
    }
    public function render()
    {
        return view('livewire.product-show');
    }

    public function sizeChange()
    {
        //in cart word op false gezet zodat de knop zichtbaar wordt als er niet voldaan wordt aan de if statement
        $this->inCart = false;

        foreach (Cart::content() as $item) {
            if ($item->id == $this->product->id && $item->options->size->id == $this->selectedSize) {
                $this->inCart = true;
                break;
            }
        }
    }
}
