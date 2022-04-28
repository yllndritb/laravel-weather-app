<?php

declare(strict_types=1);

namespace App\Services\Factories;

use App\Infrastructure\Services\Factories\FactoryContract;
use App\Services\DataObjects\WeatherData;

class WeatherFactory implements FactoryContract
{
    /**
     * @param array $attributes
     * @return WeatherData
     */
    public static function make(array $attributes): WeatherData
    {
        return new WeatherData(
            id: $attributes['id'],
            main: $attributes['main'],
            description: $attributes['description'],
            icon: $attributes['icon'],
        );
    }
}
