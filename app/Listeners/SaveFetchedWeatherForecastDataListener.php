<?php

namespace App\Listeners;

use App\Actions\SyncWeatherForecastDataAction;
use App\Events\WeatherForecastDataFetchedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveFetchedWeatherForecastDataListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(public SyncWeatherForecastDataAction $syncWeatherForecastDataAction,)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param WeatherForecastDataFetchedEvent $event
     * @return void
     */
    public function handle(WeatherForecastDataFetchedEvent $event)
    {
        $this->syncWeatherForecastDataAction->execute($event->weatherForecast);
    }
}
