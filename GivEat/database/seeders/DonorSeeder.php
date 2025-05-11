<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Donor;
use App\Models\User;

class DonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Donor::create([
            'user_id' => User::first()->id_user,
            'contact_info' => "somecontactinfo",
        ]);
    }
}