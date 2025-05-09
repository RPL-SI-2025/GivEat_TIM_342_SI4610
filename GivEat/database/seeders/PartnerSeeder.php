<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        Partner::create([
            'id' => 1,
            'name' => 'Default Partner',
            'email' => 'mitra@giveat.com',
            'phone' => '081234567890',
            'address' => 'Jl. Default No. 1'
        ]);
    }
}
