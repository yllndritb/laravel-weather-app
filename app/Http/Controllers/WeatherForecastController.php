<?php

namespace App\Http\Controllers;

use App\Actions\GetForecastForDateAction;
use App\Http\Requests\IndexWeatherForecastRequest;
use App\Http\Requests\StoreWeatherForecastRequest;
use App\Http\Requests\UpdateWeatherForecastRequest;
use App\Http\Resources\WeatherForecastResource;
use App\Models\WeatherForecast;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WeatherForecastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(GetForecastForDateAction $getForecastForDateAction, IndexWeatherForecastRequest $request): AnonymousResourceCollection
    {
        return WeatherForecastResource::collection($getForecastForDateAction->execute(Carbon::parse($request->validated()['date'])));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWeatherForecastRequest $request
     * @return WeatherForecastResource
     */
    public function store(StoreWeatherForecastRequest $request): WeatherForecastResource
    {
        return new WeatherForecastResource(WeatherForecast::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param WeatherForecast $weatherForecast
     * @return WeatherForecastResource
     */
    public function show(WeatherForecast $weatherForecast): WeatherForecastResource
    {
        return new WeatherForecastResource($weatherForecast);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWeatherForecastRequest $request
     * @param WeatherForecast $weatherForecast
     * @return WeatherForecastResource
     */
    public function update(UpdateWeatherForecastRequest $request, WeatherForecast $weatherForecast): WeatherForecastResource
    {
        $weatherForecast->update($request->validated());
        return new WeatherForecastResource($weatherForecast);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param WeatherForecast $weatherForecast
     * @return WeatherForecastResource
     */
    public function destroy(WeatherForecast $weatherForecast): WeatherForecastResource
    {
        $weatherForecast->delete();
        return new WeatherForecastResource($weatherForecast);
    }
}
