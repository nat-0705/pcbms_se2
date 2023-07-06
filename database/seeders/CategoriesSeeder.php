<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categories::create(
            ['title' => 'Plants'],
        );
        Categories::create(
            ['title' => 'Seeds'],
        );
        Categories::create(
            ['title' => 'Drinks'],
        );
        Categories::create(
            ['title' => 'Chips'],
        );
    }
}
