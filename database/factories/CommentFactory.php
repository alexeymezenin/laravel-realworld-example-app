<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'article_id' => Article::factory(),
            'body' => $this->faker->text
        ];
    }
}
