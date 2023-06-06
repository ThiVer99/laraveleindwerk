<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sizes = [37, 38, 39, 40, 41, 42, 43, 44, 45];
        foreach ($sizes as $size) {
            Size::create([
                'name' => $size,
            ]);
        }
    }
}
