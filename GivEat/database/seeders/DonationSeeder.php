<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Donation;
use App\Models\Donor;
use App\Models\Location;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Donation::create([
            'donor_id' => Donor::first()->user_id,
            'food_name' => "Sop Ayam dan Sayur",
            'description' => "Saya ingin mendonasikan satu porsi sop ayam hangat dan sayur segar untuk siapa saja yang
                    membutuhkan. Makanan ini dimasak dengan bahan berkualitas dan masih dalam kondisi layak konsumsi. 
                    Semoga dapat membantu menghangatkan hari Anda. Silakan ambil dengan senang hati!",
            'quantity' => 10,
            'expiration_date' => "2025-10-10",
            'location_id' => Location::first()->id_location,
            'image' => "someimage",
            // 'deleted_at' => null
        ]);
    }
}