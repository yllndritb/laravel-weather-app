<?php

namespace App\Models;

use App\Casts\OpenWeatherApiCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherForecast extends Model
{
    use HasFactory;


    protected $fillable = [
        'date',
        'city',
        'lat',
        'lon',
        'open_weather_api_data',
    ];

    protected $casts = [
        'open_weather_api_data' => OpenWeatherApiCast::class,
        'date' => 'date',
    ];
}
