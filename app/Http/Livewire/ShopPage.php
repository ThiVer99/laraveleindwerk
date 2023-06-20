<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Gender;
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
    public $selectedGenders = [];
    public $selectedBrands = [];
    public $selectedColors = [];
    public $selectedSizes = [];
    public $sortBy;
    public $minPrice = 0;
    public $maxPrice = 0;

    protected $queryString = ["selectedGenders"];

    public function mount()
    {
        $this->maxPrice = Product::max('price');
        $this->minPrice = Product::min('price');
    }

    public function render()
    {
        $products = Product::with(['photo', 'brand', 'colors'])
            ->when($this->selectedGenders, function ($query) {
                $query->whereIn('gender_id', $this->selectedGenders);
            })->when($this->selectedBrands, function ($query) {
                $query->whereIn('brand_id', $this->selectedBrands);
            })->when($this->selectedColors, function ($query) {
                foreach ($this->selectedColors as $color){
                    $query->whereHas('colors', function ($query) use ($color){
                        $query->where('color_id', $color);
                    });
                }
            })->when($this->selectedSizes, function ($query) {
                $query->whereHas('sizes', function ($query) {
                    $query->where('size_id', $this->selectedSizes);
                });
            })->whereBetween('price', [$this->minPrice, $this->maxPrice])
            ->when($this->sortBy == 'new', function ($query) {
                $query->orderByDesc('updated_at');
            })->when($this->sortBy == 'highest', function ($query) {
                $query->orderBy('price', 'desc');
            })->when($this->sortBy == 'lowest', function ($query) {
                $query->orderBy('price', 'asc');
            })->paginate(16);
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        $genders = Gender::all();
        //cart zodat er kan gecheckt worden als het artikel al aanwezig is in de cart
        $cart = Cart::content();

        return view('livewire.shop-page', compact('products', 'genders', 'brands', 'colors', 'sizes', 'cart'));
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
