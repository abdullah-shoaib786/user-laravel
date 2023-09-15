<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'=>'Samsung mobile',
            'price'=>'40,000',
            'description'=>'Smart phone having more features',
            'category'=>'Mobile',
            'gallery'=>'1664975115.solarmarkit-logo.png'
        ]);
    }
}
