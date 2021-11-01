<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'username' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('secret'),
            'image' => $this->faker->imageUrl,
            'bio' => $this->faker->text
        ];
    }
}
