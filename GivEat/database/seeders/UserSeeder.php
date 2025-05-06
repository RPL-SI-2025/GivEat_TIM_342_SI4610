<?php

namespace Database\Seeders;

use Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@giveat.com',
            'password' => Hash::make('admin12345'),
            'usertype' => 'admin',
        ]);

        // Mitra
        User::create([
            'name' => 'Mitra',
            'email' => 'mitra@giveat.com',
            'password' => Hash::make('mitra12345'),
            'usertype' => 'mitra',
        ]);
    }
}
