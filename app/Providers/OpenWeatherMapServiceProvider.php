<?php

namespace App\Providers;

use App\Services\OpenWeatherMapService;
use Illuminate\Support\ServiceProvider;

class OpenWeatherMapServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(OpenWeatherMapService::class, function ($app) {
            return new OpenWeatherMapService(
                config('services.open-weather-map.uri'),
                config('services.open-weather-map.key'),
                config('services.open-weather-map.timeout'),
                config('services.open-weather-map.retry.times'),
                config('services.open-weather-map.retry.sleep'),
            );
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
