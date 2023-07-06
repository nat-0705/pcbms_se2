<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customers::create([
            'groups_id' => '1',
            'name' => 'tantan',
            'email' => 'tan@tan.com',
            'phone' => '090000',
            'address' => 'Baybay City'
        ]);

        Customers::create([
            'groups_id' => '1',
            'name' => 'tannie',
            'email' => 'tannie@tannie.com',
            'phone' => '0911111',
            'address' => 'Manila City'
        ]);

        Customers::create([
            'groups_id' => '2',
            'name' => 'kyle',
            'email' => 'kyle@kyle.com',
            'phone' => '0922222',
            'address' => 'Cebu City'
        ]);

        Customers::create([
            'groups_id' => '2',
            'name' => 'lyle',
            'email' => 'lyle@lyle.com',
            'phone' => '0932323',
            'address' => 'Ormoc City'
        ]);

        Customers::create([
            'groups_id' => '3',
            'name' => 'arnel',
            'email' => 'arnel@arnel.com',
            'phone' => '09323',
            'address' => 'Maasin City'
        ]);
    }
}
