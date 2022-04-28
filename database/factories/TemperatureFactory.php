<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TemperatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'day' => $this->faker->randomFloat(),
            'min' => $this->faker->randomFloat(),
            'max' => $this->faker->randomFloat(),
            'night' => $this->faker->randomFloat(),
            'eve' => $this->faker->randomFloat(),
            'morn' => $this->faker->randomFloat(),
        ];
    }
}
