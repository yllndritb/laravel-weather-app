<?php

namespace App\Console\Commands;

use App\Jobs\SyncDataWithApiForDateJob;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SyncDataWithApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:sync {date}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Syncs all data between database and api';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        SyncDataWithApiForDateJob::dispatch(Carbon::parse($this->argument('date')));
        $this->info('Data was synchronized successfully for date ' . $this->argument('date') . '!');
        return 0;
    }
}
