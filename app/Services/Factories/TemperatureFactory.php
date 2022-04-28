<?php

declare(strict_types=1);

namespace App\Services\Factories;

use App\Infrastructure\Services\Factories\FactoryContract;
use App\Services\DataObjects\TemperatureData;

class TemperatureFactory implements FactoryContract
{
    /**
     * @param array $attributes
     * @return TemperatureData
     */
    public static function make(array $attributes): TemperatureData
    {
        return new TemperatureData(
            day: $attributes['day'],
            min: $attributes['min'],
            max: $attributes['max'],
            night: $attributes['night'],
            eve: $attributes['eve'],
            morn: $attributes['morn'],
        );
    }
}
