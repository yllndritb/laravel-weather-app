<?php

declare(strict_types=1);

namespace App\Services\Factories;

use App\Infrastructure\Services\Factories\FactoryContract;
use App\Services\DataObjects\OpenWeatherApiData;
use Carbon\Carbon;

class OpenWeatherApiFactory implements FactoryContract
{
    /**
     * @param array $attributes
     * @return OpenWeatherApiData
     */
    public static function make(array $attributes): OpenWeatherApiData
    {
        return new OpenWeatherApiData(
            dt: Carbon::parse($attributes['dt']),
            sunrise: Carbon::parse($attributes['sunrise']),
            sunset: Carbon::parse($attributes['sunset']),
            moonrise: Carbon::parse($attributes['moonrise']),
            moonset: Carbon::parse($attributes['moonset']),
            moon_phase: $attributes['moon_phase'],
            pressure: $attributes['pressure'],
            humidity: $attributes['humidity'],
            dew_point: $attributes['dew_point'],
            wind_speed: $attributes['wind_speed'],
            wind_deg: $attributes['wind_deg'],
            wind_gust: $attributes['wind_gust'],
            clouds: $attributes['clouds'],
            pop: $attributes['pop'],
            uvi: $attributes['uvi'],
            temp: TemperatureFactory::make($attributes['temp']),
            feels_like: FeelsLikeFactory::make($attributes['feels_like']),
            weather: collect($attributes['weather'])->map(fn($weather) => WeatherFactory::make(
                attributes: $weather,
            ))
        );
    }
}
