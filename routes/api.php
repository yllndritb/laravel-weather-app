<?php

use App\Http\Controllers\WeatherForecastController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/weather-forecast')->controller(WeatherForecastController::class)->group(function () {
    Route::get('/', 'index')->name('weather.index');
    Route::get('/{weatherForecast}', 'show')->name('weather.show');
    Route::put('/{weatherForecast}', 'update')->name('weather.update');
    Route::post('/', 'store')->name('weather.store');
    Route::delete('/{weatherForecast}', 'delete')->name('weather.delete');
});
