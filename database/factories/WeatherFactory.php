<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeatherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->randomDigit(),
            'main' => $this->faker->word(),
            'description' => $this->faker->sentence(3),
            'icon' => $this->faker->word(),
        ];
    }
}
