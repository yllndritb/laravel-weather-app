<?php

declare(strict_types=1);

namespace App\Services\DataObjects;

use App\Infrastructure\Services\DataObjects\DataObjectContract;
use Carbon\Carbon;

class WeatherForecastData implements DataObjectContract
{
    public function __construct(
        public float              $lon,
        public float              $lat,
        public string             $city,
        public Carbon             $date,
        public OpenWeatherApiData $open_weather_api_data
    )
    {
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'lon' => $this->lon,
            'lat' => $this->lat,
            'city' => $this->city,
            'date' => $this->date,
            'open_weather_api_data' => $this->open_weather_api_data,
        ];
    }
}
