<?php

namespace App\Providers;

use App\Services\OpenWeatherApi\Client;
use Illuminate\Support\ServiceProvider;

class OpenWeatherApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function ($app) {
            return new Client(
                config('services.open-weather-api.uri'),
                config('services.open-weather-api.token'),
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
