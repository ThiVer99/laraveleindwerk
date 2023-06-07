<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ShopPage extends Component
{
    use LivewireAlert;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'loginRedirect',
        'registerRedirect'
    ];

    public function render()
    {
        $products = Product::with('photo')->paginate(18);
        $brands = Brand::all();
        $cart = Cart::content();

        return view('livewire.shop-page',compact('products','brands','cart'));
    }

    public function addToCart($productId){
        if (Auth::user()){
            $product = Product::findOrFail($productId);
            Cart::add(
                $product->id,
                $product->name,
                1,
                $product->price
            )->associate('App\Models\Product');

            $this->emit('cart_updated');
            $this->alert('success', $product->name .' added to cart!', [
                'position' => 'center',
                'timer' => 2500,
                'toast' => true,
            ]);
        }else{
            $this->alert('info', 'Please login or register', [
                'position' => 'center',
                'timer' => 5000,
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => 'loginRedirect',
                'confirmButtonText' => 'Login',
            ]);
        }
    }
    public function loginRedirect()
    {
        return redirect()->to('/login');
    }

}
