<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipient;
use App\Models\User;

class RecipientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recipient::create([
            'user_id' => User::first()->id_user,
            'preferences' => 'somePreferences',
        ]);
    }
}