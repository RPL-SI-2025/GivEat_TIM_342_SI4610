<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'pesan' => $this->faker->sentence(15),
            'foto' => 'assets/img/default-profile.png', 
            'created_at' => now(),
        ];
    }
}
