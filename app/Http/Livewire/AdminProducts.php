<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Gender;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProducts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $genderSelect;
    public $brandSelect;

    public function render()
    {
        $brands = Brand::all();
        $genders = Gender::all();
        $products = Product::with(['keywords', 'photo', 'brand', 'productcategories', 'gender'
            ])->when($this->genderSelect, function ($query) {
                //als gender wordt aan geklikt dan wordt deze query toegevoegd aan de orignele query
                $query->where('gender_id', $this->genderSelect);
            })->when($this->brandSelect, function ($query) {
                //als brand wordt aan geklikt dan wordt deze query toegevoegd aan de orignele query
                $query->where('brand_id', $this->brandSelect);
            })->orderByDesc('created_at')->paginate(15);
        return view('livewire.admin-products', compact('brands', 'genders', 'products'));
    }


}
