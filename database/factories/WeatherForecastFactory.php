<?php

namespace Database\Factories;

use App\Services\Factories\OpenWeatherApiFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeatherForecastFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'city' => $this->faker->city(),
            'lat' => $this->faker->latitude(),
            'lon' => $this->faker->longitude(),
            'date' => $this->faker->date(),
            'open_weather_api_data' => OpenWeatherApiFactory::make([
                'dt' => $this->faker->date(),
                'sunrise' => $this->faker->date(),
                'sunset' => $this->faker->date(),
                'moonrise' => $this->faker->date(),
                'moonset' => $this->faker->date(),
                'moon_phase' => $this->faker->randomFloat(),
                'pressure' => $this->faker->randomDigit(),
                'humidity' => $this->faker->randomDigit(),
                'dew_point' => $this->faker->randomFloat(),
                'wind_speed' => $this->faker->randomFloat(),
                'wind_deg' => $this->faker->randomDigit(),
                'wind_gust' => $this->faker->randomFloat(),
                'clouds' => $this->faker->randomDigit(),
                'pop' => $this->faker->randomFloat(),
                'uvi' => $this->faker->randomFloat(),
                'temp' => (new TemperatureFactory())->definition(),
                'feels_like' => (new FeelsLikeFactory())->definition(),
                'weather' => [(new WeatherFactory())->definition()],
            ])
        ];
    }
}
