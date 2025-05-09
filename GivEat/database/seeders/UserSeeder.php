<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@giveat.com',
            'password' => 'admin12345',
            'usertype' => 'admin',
        ]);

        // Mitra
        User::create([
            'name' => 'Mitra',
            'email' => 'mitra@giveat.com',
            'password' => 'mitra12345',
            'usertype' => 'mitra',
        ]);
    }
}
