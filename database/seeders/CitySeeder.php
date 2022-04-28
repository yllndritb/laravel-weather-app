<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['name' => 'London', 'lat' => 51.5072, 'lon' => 0.1276, 'updated_at' => now(), 'created_at' => now()],
            ['name' => 'New York', 'lat' => 40.7128, 'lon' => 74.0060, 'updated_at' => now(), 'created_at' => now()],
            ['name' => 'Paris', 'lat' => 48.8566, 'lon' => 2.3522, 'updated_at' => now(), 'created_at' => now()],
            ['name' => 'Berlin', 'lat' => 52.5200, 'lon' => 13.4050, 'updated_at' => now(), 'created_at' => now()],
            ['name' => 'Tokyo', 'lat' => 35.6804, 'lon' => 139.7690, 'updated_at' => now(), 'created_at' => now()],
        ];

        City::insert($cities);
    }
}
