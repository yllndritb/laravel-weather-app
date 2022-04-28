<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\WeatherForecast;
use App\Services\DataObjects\WeatherForecastData;

class SyncWeatherForecastDataAction
{
    /**
     * @param WeatherForecastData $weatherForecast
     * @return mixed
     */
    public function execute(WeatherForecastData $weatherForecast): mixed
    {
        return WeatherForecast::updateOrCreate(
            ['city' => $weatherForecast->city, 'date' => $weatherForecast->date],
            $weatherForecast->toArray()
        );
    }
}
