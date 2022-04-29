<?php

namespace Tests\Feature;

use App\Models\City;
use App\Services\DataObjects\WeatherForecastData;
use App\Services\OpenWeatherMapService;
use App\Services\Resources\WeatherForecastResource;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class OpenWeatherMapTest extends TestCase
{
    /**
     * @return void
     */
    public function test_it_can_build_open_weather_map_service()
    {
        $this->assertInstanceOf(
            expected: OpenWeatherMapService::class,
            actual: (new OpenWeatherMapService(
                baseUri: Str::random(),
                key: Str::random(),
                timeout: 10,
            )));
    }

    /**
     * @return void
     */
    public function test_it_can_init_a_pending_request()
    {
        $service = new OpenWeatherMapService(
            baseUri: Str::random(),
            key: Str::random(),
            timeout: 10,
        );
        $this->assertInstanceOf(
            expected: PendingRequest::class,
            actual: $service->makeRequest());
    }

    /**
     * @return void
     */
    public function test_it_can_resolve_open_weather_map_service_from_container()
    {

        $this->assertInstanceOf(
            expected: OpenWeatherMapService::class,
            actual: resolve(OpenWeatherMapService::class));
    }


    /**
     * @return void
     */
    public function test_it_can_init_a_pending_request_from_resolved_open_weather_map_service()
    {
        $this->assertInstanceOf(
            expected: PendingRequest::class,
            actual: resolve(OpenWeatherMapService::class)->makeRequest());
    }

    /**
     * @return void
     */
    public function test_it_can_get_weather_forecast_resource()
    {
        /**
         * @var OpenWeatherMapService
         */
        $openWeatherMap = resolve(OpenWeatherMapService::class);

        $this->assertInstanceOf(
            expected: WeatherForecastResource::class,
            actual: $openWeatherMap->weatherForecast());
    }

    /**
     * @return void
     */
    public function test_it_can_get_weather_forecast_based_on_city_and_date()
    {

        $this->seed();

        $response = json_decode(
            json: file_get_contents(
                filename: base_path("tests/Response/Forecast.json"),
            ),
            associative: true,
        );
        OpenWeatherMapService::fake([
            'api.openweathermap.org/data/2.5' => Http::response(
                body: $response,
                status: Response::HTTP_OK,
            ),
        ]);
        /**
         * @var OpenWeatherMapService
         */
        $openWeatherMap = resolve(OpenWeatherMapService::class);
        $filteredByDayAndCity = $openWeatherMap->weatherForecast()->findByCityAndDate(City::first(), now());

        $this->assertInstanceOf(
            expected: WeatherForecastData::class,
            actual: $filteredByDayAndCity);
    }
}
