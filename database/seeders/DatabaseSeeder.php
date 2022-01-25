<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        Admin::create([
            'name' => 'Admin',
            'email' => 'zahws@admin.com',
            'password' => bcrypt('zahws123')
        ]);

        Product::create([
            'name' => 'Aceh Gayo 1kg',
            'image' => '1.jpg',
            'price' => 250000,
            'rating' => 4.5,
            'sold' => '560',
            'category' => 'Beans'
        ]);
        Product::create([
            'name' => 'Toraja Sapan 1kg',
            'image' => '2.jpg',
            'price' => 250000,
            'rating' => 4.7,
            'sold' => '455',
            'category' => 'Beans'

        ]);
        Product::create([
            'name' => 'Arabika Bali Kintamani 1kg',
            'image' => '3.jpg',
            'price' => 290000,
            'rating' => 4.7,
            'sold' => '899',
            'category' => 'Beans'


        ]);
        Product::create([
            'name' => 'Arabika Puntang 1kg',
            'image' => '4.jpg',
            'price' => 210000,
            'rating' => 4.9,
            'sold' => '677',
            'category' => 'Beans'

        ]);
        Product::create([
            'name' => 'Arabika Malabar 1kg',
            'image' => '5.jpg',
            'price' => 220000,
            'rating' => 4.7,
            'sold' => '899',
            'category' => 'Beans'

        ]);
        Product::create([
            'name' => 'Arabika Manglayang 1kg',
            'image' => '6.jpg',
            'price' => 240000,
            'rating' => 4.7,
            'sold' => '899',
            'category' => 'Beans'

        ]);
        Product::create([
            'name' => 'Robusta Bali 1kg',
            'image' => '7.jpg',
            'price' => 140000,
            'rating' => 4.3,
            'sold' => '20',
            'category' => 'Beans'

        ]);
        Product::create([
            'name' => 'Arabika Aceh gayo Premium 1kg',
            'image' => '8.jpg',
            'price' => 270000,
            'rating' => 4.8,
            'sold' => '899',
            'category' => 'Beans'

        ]);
        Product::create([
            'name' => 'V60 Size "M"',
            'image' => 'v60.jpg',
            'price' => 100000,
            'rating' => 4.8,
            'sold' => '500',
            'category' => 'Souvenirs'

        ]);
    }
}
