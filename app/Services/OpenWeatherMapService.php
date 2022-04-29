<?php

declare(strict_types=1);

namespace App\Services;


use App\Infrastructure\Services\Resources\ResourceContract;
use App\Infrastructure\Services\ServiceContract;
use App\Services\Concerns\HasFake;
use App\Services\Resources\WeatherForecastResource;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class OpenWeatherMapService implements ServiceContract
{
    use HasFake;

    public function __construct(
        public readonly string $baseUri,
        public readonly string $key,
        public readonly int $timeout,
        public readonly null|int $retryTimes = null,
        public readonly null|int $retrySleep = null,
    )
    {
    }

    public function makeRequest(): PendingRequest
    {

        $request = Http::baseUrl(
            url: $this->baseUri,
        )->timeout(
            seconds: $this->timeout,
        );

        if (!is_null($this->retryTimes) && !is_null($this->retrySleep)) {
            $request->retry(
                times: $this->retryTimes,
                sleep: $this->retrySleep,
            );
        }

        return $request;
    }

    /**
     * @return WeatherForecastResource
     */
    public function weatherForecast(): WeatherForecastResource
    {
        return new WeatherForecastResource(
            service: $this,
        );
    }
}
