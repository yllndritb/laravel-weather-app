<?php

declare(strict_types=1);

namespace App\Services\DataObjects;

use App\Infrastructure\Services\DataObjects\DataObjectContract;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class OpenWeatherApiData implements DataObjectContract
{

    public function __construct(
        public Carbon          $dt,
        public Carbon          $sunrise,
        public Carbon          $sunset,
        public Carbon          $moonrise,
        public Carbon          $moonset,
        public float           $moon_phase,
        public int             $pressure,
        public int             $humidity,
        public float           $dew_point,
        public float           $wind_speed,
        public int             $wind_deg,
        public float           $wind_gust,
        public int             $clouds,
        public float           $pop,
        public float           $uvi,
        public TemperatureData $temp,
        public FeelsLikeData   $feels_like,
        public Collection      $weather
    )
    {
    }


    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'dt' => $this->dt,
            'sunrise' => $this->sunrise,
            'sunset' => $this->sunset,
            'moonrise' => $this->moonrise,
            'moonset' => $this->moonset,
            'moon_phase' => $this->moon_phase,
            'pressure' => $this->pressure,
            'humidity' => $this->humidity,
            'dew_point' => $this->dew_point,
            'wind_speed' => $this->wind_speed,
            'wind_deg' => $this->wind_deg,
            'wind_gust' => $this->wind_gust,
            'clouds' => $this->clouds,
            'pop' => $this->pop,
            'uvi' => $this->uvi,
            'temp' => $this->temp,
            'feels_like' => $this->feels_like,
            'weather' => $this->weather,
        ];
    }
}
