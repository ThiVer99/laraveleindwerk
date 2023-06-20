<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = Color::all();
        Product::all()->each(function ($product) use ($colors) {
            $product->colors()->attach(
                $colors->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
