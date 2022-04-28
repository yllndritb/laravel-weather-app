<?php

declare(strict_types=1);

namespace App\Actions;

use Carbon\Carbon;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Collection;

class FetchAndSyncWeatherForecastDataAction
{

    /**
     * @param FetchWeatherForecastDataAction $fetchWeatherForecastDataAction
     * @param SyncWeatherForecastDataAction $syncWeatherForecastDataAction
     */
    public function __construct(
        public FetchWeatherForecastDataAction $fetchWeatherForecastDataAction,
        public SyncWeatherForecastDataAction  $syncWeatherForecastDataAction,
    )
    {
    }

    /**
     * @param Carbon $date
     * @param Collection $cities
     * @return Collection|RequestException|null
     * @throws RequestException
     */
    public function execute(Collection $cities, Carbon $date): Collection|RequestException|null
    {
        $weatherForecastArr = [];
        foreach ($cities as $city) {
            $weatherForecast = $this->fetchWeatherForecastDataAction->execute($city, $date);
            if ($weatherForecast) {
                $this->syncWeatherForecastDataAction->execute($weatherForecast);
                $weatherForecastArr[] = $weatherForecast;
            }
        }
        return collect($weatherForecastArr);
    }
}
