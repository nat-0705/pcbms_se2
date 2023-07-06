<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Products::create([
            'categories_id' => '1',
            'title' => 'Cactus',
            'description' => 'Pointy plant',
            'cost_price' => '200',
            'price' => '1000',
        ]);

        Products::create([
            'categories_id' => '1',
            'title' => 'Rose',
            'description' => 'Beautiful Plant',
            'cost_price' => '100',
            'price' => '500',
        ]);

        Products::create([
            'categories_id' => '1',
            'title' => 'Jade',
            'description' => 'Wonderful Jae Plant',
            'cost_price' => '700',
            'price' => '1200',
        ]);

        Products::create([
            'categories_id' => '2',
            'title' => 'Mushroom',
            'description' => 'Delicious Mushroom',
            'cost_price' => '5',
            'price' => '20',
        ]);

        Products::create([
            'categories_id' => '3',
            'title' => 'Coca-Cola',
            'description' => 'Super Delious',
            'cost_price' => '30',
            'price' => '50',
        ]);

        Products::create([
            'categories_id' => '3',
            'title' => 'Pepsi',
            'description' => 'Deliousyoso',
            'has_stock' => '0'
        ]);

        Products::create([
            'categories_id' => '3',
            'title' => 'Orange Juice',
            'description' => 'Pure orange',
            'cost_price' => '40',
            'price' => '70',
        ]);

        Products::create([
            'categories_id' => '4',
            'title' => 'Cracklings',
            'description' => 'Yummy Cracklings',
            'cost_price' => '10',
            'price' => '15',
        ]);

        Products::create([
            'categories_id' => '4',
            'title' => 'Cracklings',
            'description' => 'Yummy Cracklings',
            'has_stock' => '0'
        ]);
    }
}
