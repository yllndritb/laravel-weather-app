<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\City;
use App\Models\WeatherForecast;
use Carbon\Carbon;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Collection;

class GetForecastForDateAction
{



    /**
     * @param FetchAndSyncWeatherForecastDataAction $fetchAndSyncWeatherForecastDataAction
     */
    public function __construct(
        public FetchAndSyncWeatherForecastDataAction $fetchAndSyncWeatherForecastDataAction,
    )
    {
    }

    /**
     *
     * @param Carbon $date
     * @return Collection|RequestException
     * @throws RequestException
     */
    public function execute(Carbon $date): Collection|RequestException
    {
        $weatherForecast = WeatherForecast::where('date', $date->format('Y-m-d'))->get();
        if ($weatherForecast->count() > 0) return $weatherForecast;

        $apiWeatherForecast = $this->fetchAndSyncWeatherForecastDataAction->execute(City::all(), $date);
        if ($apiWeatherForecast->count() > 0) return $apiWeatherForecast;

        abort(404,"Weather forecast for specified date was not found!");
    }
}
