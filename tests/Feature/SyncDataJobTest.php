<?php

namespace Tests\Feature;

use App\Jobs\SyncDataWithApiForDateJob;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;

class SyncDataJobTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_it_sync_data_between_api_database()
    {
        $this->seed();
        Bus::fake();
        Artisan::call('api:sync ' . Carbon::now()->format('Y-m-d'));
        Bus::assertDispatched(SyncDataWithApiForDateJob::class);
    }
}
