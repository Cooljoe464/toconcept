<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'slug' => fake()->slug(),
        ];
    }
}
