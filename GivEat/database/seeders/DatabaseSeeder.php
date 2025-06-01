<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\CategorySeeder;  // Tambahkan ini
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Memanggil UserSeeder dan CategorySeeder
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            PartnerSeeder::class,
        ]);

        // Jika ingin membuat user tertentu
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
