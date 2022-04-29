<?php

namespace App\Jobs;

use App\Actions\FetchWeatherForecastDataAction;
use App\Actions\SyncWeatherForecastDataAction;
use App\Models\City;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Client\RequestException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncDataWithApiForDateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public Carbon $date)
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws RequestException
     */
    public function handle(FetchWeatherForecastDataAction $fetchWeatherForecastDataAction, SyncWeatherForecastDataAction $syncWeatherForecastDataAction)
    {
        foreach (City::all() as $city) {
            $weatherForecast = $fetchWeatherForecastDataAction->execute($city, $this->date);
            if ($weatherForecast) {
                $syncWeatherForecastDataAction->execute($weatherForecast);
            }
        }
    }
}
