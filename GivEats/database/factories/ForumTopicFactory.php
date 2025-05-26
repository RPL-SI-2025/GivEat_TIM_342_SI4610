<?php

namespace Database\Factories;

use App\Models\ForumTopic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ForumTopicFactory extends Factory
{
    protected $model = ForumTopic::class;

    public function definition()
    {
        return [
            'user_id' => 4,
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(5),
        ];
    }
}
