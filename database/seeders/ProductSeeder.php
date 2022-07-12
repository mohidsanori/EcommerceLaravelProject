<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

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
        $arr = [
            [
                'name' => 'samsung mobile',
                'price' => '700',
                'description' => "Latest Samartphone with updated features",
                'category' => 'mobile',
                'gallery' => 'images/mobile.jpg'
            ],
            [
                'name' => 'Macbook Pro 16 inch',
                'price' => '2099',
                'description' => "More thin and lightweight",
                'category' => 'laptop',
                'gallery' => 'images/macbook.jpg'
            ],
            [
                'name' => 'Playstation 5',
                'price' => '850',
                'description' => "More powerfull",
                'category' => 'gaming',
                'gallery' => 'images/playstation.jpg'
            ],
            [
                'name' => 'brAun Watch',
                'price' => '190',
                'description' => "mate black watch",
                'category' => 'watch',
                'gallery' => 'images/watch.jpg'
            ],
            [
                'name' => 'Bose headphones',
                'price' => '250',
                'description' => "more base and sound with noise canceling feature",
                'category' => 'headphones',
                'gallery' => 'images/headphone.jpg'
            ]
        ];
        DB::table('products')->insert($arr);
    }
}
