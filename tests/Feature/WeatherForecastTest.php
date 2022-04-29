<?php

namespace Tests\Feature;

use App\Events\WeatherForecastDataFetchedEvent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class WeatherForecastTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_it_can_show_weather_forecast_based_on_a_date()
    {
        Event::fake();


        $this->seed();

        $now = now();

        $response = $this->getJson('/api/weather-forecast?date=' . $now);

        Event::assertDispatched(WeatherForecastDataFetchedEvent::class);

        $response
            ->assertJson(fn(AssertableJson $json) => $json->has(5)
                ->first(fn($json) => $json
                    ->has('date')
                    ->has('open_weather_api_data')
                    ->etc()
                )
            );
        $response->assertStatus(200);
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function test_it_can_pull_weather_forecast_based_on_a_date()
    {
        Event::fake();

        $this->seed();

        $response = $this->postJson('/api/weather-forecast?date=' . now());

        Event::assertDispatched(WeatherForecastDataFetchedEvent::class);

        $response
            ->assertJson(fn(AssertableJson $json) => $json->has(5)
                ->first(fn($json) => $json
                    ->has('date')
                    ->has('open_weather_api_data')
                    ->etc()
                )
            );

        $response->assertStatus(201);
    }

    /**
     * @return void
     */
    public function test_it_can_update_weather_forecast_based_on_a_date()
    {
        $this->seed();

        $response = $this->putJson('/api/weather-forecast?date=' . now());

        $response
            ->assertJson(fn(AssertableJson $json) => $json->has(5)
                ->first(fn($json) => $json
                    ->has('date')
                    ->has('open_weather_api_data')
                    ->etc()
                )
            );

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_it_delete_update_weather_forecast_based_on_a_date()
    {
        $this->seed();

        $response = $this->deleteJson('/api/weather-forecast?date=' . now());

        $response->assertStatus(204);
    }
}
