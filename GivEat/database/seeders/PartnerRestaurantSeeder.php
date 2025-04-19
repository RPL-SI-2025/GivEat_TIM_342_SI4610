<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnerRestaurantSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('partner_restaurants')->insert([
            [
                'name' => 'Warung Makan A',
                'address' => 'Jl. Contoh No.1',
                'latitude' => -6.200500,
                'longitude' => 106.816700,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dapur GivEat',
                'address' => 'Jl. Kolaborasi 2',
                'latitude' => -6.205100,
                'longitude' => 106.818800,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'RM Sederhana',
                'address' => 'Jl. Makan Bersama No.10',
                'latitude' => -6.197800,
                'longitude' => 106.814300,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
