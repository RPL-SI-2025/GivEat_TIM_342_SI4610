<?php

namespace Database\Seeders;

use App\Models\FoodItem;
use Illuminate\Database\Seeder;

class FoodItemsTableSeeder extends Seeder
{
    public function run()
    {
        FoodItem::create([
            'name' => 'Sop Ayam dan Sayur',
            'description' => 'Sop ayam dengan sayuran segar.',
            'image' => 'sop_ayam_sayur.png',
            'portion' => 3,
            'prepared_at' => now()->subHours(1),
            'restaurant_id' => 1,
        ]);

        FoodItem::create([
            'name' => 'Ayam Goreng',
            'description' => 'Ayam goreng dengan bumbu khas.',
            'image' => 'ayam_goreng.png',
            'portion' => 2,
            'prepared_at' => now()->subHours(2),
            'restaurant_id' => 2,
        ]);

        FoodItem::create([
            'name' => 'Sayur Asem',
            'description' => 'Sayur asem dengan sayuran khas.',
            'image' => 'sayur_asem.png',
            'portion' => 5,
            'prepared_at' => now()->subHours(3),
            'restaurant_id' => 3,
        ]);

        FoodItem::create([
            'name' => 'Kwetiau Goreng',
            'description' => 'Kwetiau goreng nikmat.',
            'image' => 'kwetiau_goreng.png',
            'portion' => 1,
            'prepared_at' => now()->subHours(4),
            'restaurant_id' => 4,
        ]);

        FoodItem::create([
            'name' => 'Sate Ayam',
            'description' => 'Sate ayam dengan bumbu kacang.',
            'image' => 'sate_ayam.png',
            'portion' => 4,
            'prepared_at' => now()->subHours(5),
            'restaurant_id' => 1,
        ]);

        FoodItem::create([
            'name' => 'Sop Udang',
            'description' => 'Sop udang dengan sayuran segar.',
            'image' => 'sop_udang.png',
            'portion' => 6,
            'prepared_at' => now()->subHours(6),
            'restaurant_id' => 2,
        ]);

        FoodItem::create([
            'name' => 'Ketoprak',
            'description' => 'Ketoprak dengan sayuran dan telur.',
            'image' => 'ketoprak.png',
            'portion' => 3,
            'prepared_at' => now()->subHours(1),
            'restaurant_id' => 3,
        ]);

        FoodItem::create([
            'name' => 'Nasi Goreng',
            'description' => 'Nasi Goreng dengan bumbu khas.',
            'image' => 'nasi_goreng.png',
            'portion' => 2,
            'prepared_at' => now()->subHours(2),
            'restaurant_id' => 4,
        ]);
    }
}