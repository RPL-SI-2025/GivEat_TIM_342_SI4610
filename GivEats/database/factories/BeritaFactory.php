<?php

namespace Database\Factories;

use App\Models\Berita;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BeritaFactory extends Factory
{
    protected $model = Berita::class;

    public function definition()
    {
        return [
            'judul' => $this->faker->sentence,
            'ringkasan' => $this->faker->paragraph,
            'isi' => $this->faker->text(1000),
            'gambar' => '../tests/Browser/test-images/test.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
