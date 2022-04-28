<?php

declare(strict_types=1);

namespace App\Services\Factories;

use App\Infrastructure\Services\Factories\FactoryContract;
use App\Services\DataObjects\FeelsLikeData;

class FeelsLikeFactory implements FactoryContract
{
    /**
     * @param array $attributes
     * @return FeelsLikeData
     */
    public static function make(array $attributes): FeelsLikeData
    {
        return new FeelsLikeData(
            day: $attributes['day'],
            night: $attributes['night'],
            eve: $attributes['eve'],
            morn: $attributes['morn'],
        );
    }
}
