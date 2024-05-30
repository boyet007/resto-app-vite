<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurant::create([
            'name' => 'Mcdonal',
            'contact' => '111111',
            'address' => 'Jatiasih'
        ]);

        Restaurant::create([
            'name' => 'Burger King',
            'contact' => '22222',
            'address' => 'Pondok Gede'
        ]);

        Restaurant::create([
            'name' => 'Padang Sederhana',
            'contact' => '333333',
            'address' => 'Duta Indah'
        ]);

        Restaurant::create([
            'name' => 'Velanny',
            'contact' => '444444',
            'address' => 'Jatikramat'
        ]);
        
    }
}
