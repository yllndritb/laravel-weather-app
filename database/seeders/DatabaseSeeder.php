<?php

namespace Database\Seeders;

use App\Models\WeatherForecast;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        WeatherForecast::factory()->count(5)->create();

        $this->call(CitySeeder::class);
    }
}
