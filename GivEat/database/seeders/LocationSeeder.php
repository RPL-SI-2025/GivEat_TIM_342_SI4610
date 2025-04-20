<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create([
            'address' => 'Test Address',
            'location_url' => 'https://maps.app.goo.gl/iDKgFx7JW1ppqdEB6',
        ]);
    }
}