<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FeelsLikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'day' => $this->faker->randomFloat(),
            'night' => $this->faker->randomFloat(),
            'eve' => $this->faker->randomFloat(),
            'morn' => $this->faker->randomFloat(),
        ];
    }
}
