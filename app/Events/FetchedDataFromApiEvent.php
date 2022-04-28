<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class FetchedDataFromApiEvent
{
    use Dispatchable, SerializesModels;


    /**
     * @param Collection $apiWeatherForecast
     */
    public function __construct(public Collection $apiWeatherForecast)
    {
        //
    }
}
