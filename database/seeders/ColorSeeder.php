<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $colors = ['Black','White','Blue','Green','Red'];
        foreach ($colors as $color) {
            Color::create([
                'name' => $color,
            ]);
        }
    }
}
