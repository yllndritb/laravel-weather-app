<?php

declare(strict_types=1);

namespace App\Services\Factories;

use App\Infrastructure\Services\Factories\FactoryContract;
use App\Services\DataObjects\WeatherForecastData;
use Carbon\Carbon;

class WeatherForecastFactory implements FactoryContract
{
    /**
     * @param array $attributes
     * @return WeatherForecastData
     */
    public static function make(array $attributes): WeatherForecastData
    {
        return new WeatherForecastData(
            lon: $attributes['lon'],
            lat: $attributes['lat'],
            city: $attributes['city'],
            date: Carbon::parse($attributes['dt']),
            open_weather_api_data: OpenWeatherApiFactory::make($attributes)
        );
    }
}
