<?php

namespace Database\Factories;

use App\Models\Berita;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeritaFactory extends Factory
{
    protected $model = Berita::class;

    public function definition()
    {
        return [
            'judul' => $this->faker->sentence(6),
            'ringkasan' => $this->faker->paragraph(2),
            'isi' => $this->faker->paragraphs(5, true),
            'gambar' => 'default.jpg', 
        ];
    }
}
