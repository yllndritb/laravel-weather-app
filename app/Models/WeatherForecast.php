<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherForecast extends Model
{
    use HasFactory;


    protected $fillable = [
      'date',
      'weather_forecast_api_data',
    ];
}
