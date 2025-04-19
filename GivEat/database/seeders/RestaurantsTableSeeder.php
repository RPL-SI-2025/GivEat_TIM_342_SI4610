<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    public function run()
    {
        Restaurant::create([
            'name' => 'Resto Bapak',
            'logo' => 'resto1.png',
        ]);

        Restaurant::create([
            'name' => 'Cheffest',
            'logo' => 'cheffest.png',
        ]);

        Restaurant::create([
            'name' => 'Bistro',
            'logo' => 'bistro.png',
        ]);

        Restaurant::create([
            'name' => 'Nampan Saji',
            'logo' => 'resto2.png',
        ]);

        Restaurant::create([
            'name' => 'Selera Bersama',
            'logo' => 'selera.png',
        ]);

        Restaurant::create([
            'name' => 'Dapur Keluarga',
            'logo' => 'dapur.png',
        ]);
    }
}