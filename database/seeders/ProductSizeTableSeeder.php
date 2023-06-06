<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sizes = Size::all();
        Product::all()->each(function ($product) use ($sizes) {
            $product->sizes()->attach(
                $sizes->random(rand(1, count($sizes)))->pluck('id')->toArray()
            );
        });
    }
}
