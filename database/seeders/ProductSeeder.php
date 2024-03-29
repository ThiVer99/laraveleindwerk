<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Gender;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $brands = Brand::all();
        $photos = Photo::all();
        $genders = Gender::all();
        for ($i = 0; $i < 100; $i++) {
            $product = new Product();
            $product->name = fake()->words(2, true);
            $product->body = fake()->paragraphs(2, true);
            $product->photo_id = $photos->random()->id;
            $product->brand_id = $brands->random()->id;
            $product->price = fake()->randomNumber(3,false);
            $product->gender_id = $genders->random()->id;
            $product->save();
        }
    }
}
