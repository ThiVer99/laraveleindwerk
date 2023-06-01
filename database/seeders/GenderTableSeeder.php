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
            'name' => 'M'
        ]);
        DB::table('genders')->insert([
            'name' => 'V'
        ]);
        DB::table('genders')->insert([
            'name' => 'X'
        ]);
    }
}
