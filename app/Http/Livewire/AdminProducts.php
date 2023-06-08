<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Gender;
use App\Models\Product;
use App\Models\Size;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProducts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $genderSelect;
    public $brandSelect;
    public $colorSelect;
    public $sizeSelect;
    public $searchProduct;

    public function render()
    {
        $brands = Brand::all();
        $genders = Gender::all();
        $colors = Color::all();
        $sizes = Size::all();
        $products = Product::with(['keywords', 'photo', 'brand', 'productcategories', 'gender', 'colors', 'sizes'
        ])->when($this->genderSelect, function ($query) {
            //als gender wordt aan geklikt dan wordt deze query toegevoegd aan de orignele query
            $query->where('gender_id', $this->genderSelect);
        })->when($this->brandSelect, function ($query) {
            //als brand wordt aan geklikt dan wordt deze query toegevoegd aan de orignele query
            $query->where('brand_id', $this->brandSelect);
        })->when($this->colorSelect, function ($query) {
            //als color wordt aan geklikt dan wordt deze query toegevoegd aan de orignele query
            $query->whereHas('colors', function ($query) {
                $query->where('color_id', $this->colorSelect);
            });
        })->when($this->sizeSelect, function ($query) {
            //als size wordt aan geklikt dan wordt deze query toegevoegd aan de orignele query
            $query->whereHas('sizes', function ($query) {
                $query->where('size_id', $this->sizeSelect);
            });
        })->where('name','LIKE','%' . $this->searchProduct . '%')->orderByDesc('created_at')->paginate(15);
        return view('livewire.admin-products', compact('brands', 'genders', 'colors', 'sizes', 'products'));
    }


}
