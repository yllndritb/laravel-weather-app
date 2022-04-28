<?php

namespace App\Jobs;

use App\Actions\FetchAndSyncWeatherForecastDataAction;
use App\Models\City;
use App\Models\WeatherForecast;
use App\Services\OpenWeatherMapService;
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
    public function handle(FetchAndSyncWeatherForecastDataAction $fetchAndSyncWeatherForecastDataAction)
    {
        $fetchAndSyncWeatherForecastDataAction->execute(City::all(), $this->date);
    }
}
