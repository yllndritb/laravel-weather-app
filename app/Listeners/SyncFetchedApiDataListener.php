<?php

namespace App\Listeners;

use App\Events\FetchedDataFromApiEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SyncFetchedApiDataListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param FetchedDataFromApiEvent $event
     * @return void
     */
    public function handle(FetchedDataFromApiEvent $event)
    {
        //
    }
}
