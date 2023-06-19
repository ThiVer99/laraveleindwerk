<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('genders')->insert([
            'name' => 'Men'
        ]);
        DB::table('genders')->insert([
            'name' => 'Women'
        ]);
        DB::table('genders')->insert([
            'name' => 'Unisex'
        ]);
    }
}
