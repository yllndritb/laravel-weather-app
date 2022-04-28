<?php

namespace App\Models;

use App\Services\DataObjects\OpenWeatherApiData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lat',
        'lon'
    ];

}
