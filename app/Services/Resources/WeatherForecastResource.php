<?php

declare(strict_types=1);

namespace App\Services\Resources;

use App\Infrastructure\Services\Resources\ResourceContract;
use App\Infrastructure\Services\ServiceContract;
use App\Models\City;
use App\Services\DataObjects\WeatherForecastData;
use App\Services\Factories\WeatherForecastFactory;
use Carbon\Carbon;
use Illuminate\Http\Client\RequestException;

class WeatherForecastResource implements ResourceContract
{
    public function __construct(
        private readonly ServiceContract $service,
    )
    {
    }

    public function service(): ServiceContract
    {
        return $this->service;
    }

    /**
     * @param City $city
     * @param Carbon $date
     * @return WeatherForecastData|null
     * @throws RequestException
     */
    public function findByCityAndDate(City $city, Carbon $date): ?WeatherForecastData
    {
        $request = $this->service->makeRequest();

        $response = $request->get(
            url: "/onecall",
            query: [
                'appid' => $this->service->key,
                'units' => 'metric',
                'exclude' => 'current,minutely,hourly,alerts',
                'lat' => $city->lat,
                'lon' => $city->lon,
            ]
        );

        if ($response->failed()) {
            throw $response->toException();
        }

        return $response->collect('daily')->map(function (array $weatherForecast) use ($city, $date) {
            $weatherForecast['lat'] = $city->lat;
            $weatherForecast['lon'] = $city->lon;
            $weatherForecast['city'] = $city->name;
            if (Carbon::parse($weatherForecast['dt'])->format('y-m-d') === $date->format('y-m-d')) {
                return WeatherForecastFactory::make(
                    attributes: $weatherForecast,
                );
            }
            return null;
        })->filter()->first();
    }
}
