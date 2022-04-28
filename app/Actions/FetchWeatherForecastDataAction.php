<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\City;
use App\Services\DataObjects\WeatherForecastData;
use App\Services\OpenWeatherMapService;
use Carbon\Carbon;
use Illuminate\Http\Client\RequestException;

class FetchWeatherForecastDataAction
{

    /**
     * @param OpenWeatherMapService $openWeatherMapService
     */
    public function __construct(public OpenWeatherMapService $openWeatherMapService)
    {
    }

    /**
     * @param Carbon $date
     * @param City $city
     * @return WeatherForecastData|null
     * @throws RequestException
     */
    public function execute(City $city, Carbon $date): ?WeatherForecastData
    {
        return $this->openWeatherMapService->weatherForecast()->findByCityAndDate($city, $date);
    }
}
