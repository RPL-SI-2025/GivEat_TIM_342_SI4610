<?php

namespace Database\Factories;

use App\Models\ForumComment;
use App\Models\User;
use App\Models\ForumTopic;
use Illuminate\Database\Eloquent\Factories\Factory;

class ForumCommentFactory extends Factory
{
    protected $model = ForumComment::class;

    public function definition()
    {
        return [
            'user_id' => 4,
            'forum_topic_id' => ForumTopic::factory(),
            'komentar' => $this->faker->sentence(),
        ];
    }
}
