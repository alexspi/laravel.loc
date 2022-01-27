<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph(30),
            'user_id' => rand(1, 4),
            'category_id' => rand(1, 10),
            'is_published' => rand(0, 1),
        ];
    }
}
