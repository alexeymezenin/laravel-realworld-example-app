<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'description' => $this->faker->text,
            'body' => $this->faker->text
        ];
    }
}
