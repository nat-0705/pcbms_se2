<?php

namespace Database\Seeders;

use App\Models\Groups;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Groups::create(
            ['title' => 'Customer'],
        );
        Groups::create(
            ['title' => 'Investor'],
        );
        Groups::create(
            ['title' => 'Supplier'],
        );

    }
}
