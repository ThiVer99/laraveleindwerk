<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
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
    public $selectedBrands = [];
    public $selectedColors = [];
    public $selectedSizes = [];
    public $minPrice = 0;
    public $maxPrice = 0;

    public function mount(){
        $this->maxPrice = Product::max('price');
        $this->minPrice = Product::min('price');
    }

    public function render()
    {
        $products = Product::with(['photo', 'brand', 'colors'])
            ->when($this->selectedBrands, function ($query) {
                $query->whereIn('brand_id', $this->selectedBrands);
            })->when($this->selectedColors, function ($query) {
                $query->whereHas('colors', function ($query) {
                    $query->where('color_id', $this->selectedColors);
                });
            })->when($this->selectedSizes, function ($query) {
                $query->whereHas('sizes', function ($query) {
                    $query->where('size_id', $this->selectedSizes);
                });
                dd($query);
            })->whereBetween('price',[$this->minPrice,$this->maxPrice])
            ->orderByDesc('updated_at')->paginate(18);
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        //cart zodat er kan gecheckt worden als het artikel al aanwezig is in de cart
        $cart = Cart::content();

        return view('livewire.shop-page', compact('products', 'brands', 'colors', 'sizes', 'cart'));
    }

    public function addToCart($productId)
    {
        if (Auth::user()) {
            $product = Product::findOrFail($productId);
            Cart::add(
                $product->id,
                $product->name,
                1,
                $product->price
            )->associate('App\Models\Product');

            $this->emit('cart_updated');
            $this->alert('success', $product->name . ' added to cart!', [
                'position' => 'center',
                'timer' => 2500,
                'toast' => true,
            ]);
        } else {
            $this->alert('info', 'Please login or register', [
                'position' => 'center',
                'timer' => 5000,
                'toast' => false,
                'showConfirmButton' => true,
                'showDenyButton' => true,
                'onConfirmed' => 'loginRedirect',
                'onDenied' => 'registerRedirect',
                'confirmButtonText' => 'Login',
                'denyButtonText' => 'Register'
            ]);
        }
    }

    public function loginRedirect()
    {
        return redirect()->to('/login');
    }

    public function registerRedirect()
    {
        return redirect()->to('/register');
    }
}
