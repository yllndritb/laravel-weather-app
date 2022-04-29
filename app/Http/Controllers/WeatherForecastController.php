<?php

namespace App\Http\Controllers;

use App\Actions\FetchAndSyncWeatherForecastDataAction;
use App\Actions\GetForecastForDateAction;
use App\Http\Requests\DeleteWeatherForecastRequest;
use App\Http\Requests\ShowWeatherForecastRequest;
use App\Http\Requests\StoreWeatherForecastRequest;
use App\Http\Requests\UpdateWeatherForecastRequest;
use App\Http\Resources\WeatherForecastResource;
use App\Models\City;
use App\Models\WeatherForecast;
use Carbon\Carbon;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class WeatherForecastController extends Controller
{

    /**
     * @param StoreWeatherForecastRequest $request
     * @param FetchAndSyncWeatherForecastDataAction $fetchAndSyncWeatherForecastDataAction
     * @return JsonResponse
     * @throws RequestException
     */
    public function store(StoreWeatherForecastRequest $request, FetchAndSyncWeatherForecastDataAction $fetchAndSyncWeatherForecastDataAction): JsonResponse
    {
        $weatherForecast = $fetchAndSyncWeatherForecastDataAction->execute(City::all(), Carbon::parse($request->validated()['date']));
        return response()->json(WeatherForecastResource::collection($weatherForecast), Response::HTTP_CREATED);

    }

    /**
     * @param GetForecastForDateAction $getForecastForDateAction
     * @param ShowWeatherForecastRequest $request
     * @return JsonResponse
     * @throws RequestException
     */
    public function show(GetForecastForDateAction $getForecastForDateAction, ShowWeatherForecastRequest $request): JsonResponse
    {
        return response()->json(WeatherForecastResource::collection($getForecastForDateAction->execute(Carbon::parse($request->validated()['date']))), Response::HTTP_OK);

    }

    /**
     * @param UpdateWeatherForecastRequest $request
     * @param FetchAndSyncWeatherForecastDataAction $fetchAndSyncWeatherForecastDataAction
     * @return JsonResponse
     * @throws RequestException
     */
    public function update(UpdateWeatherForecastRequest $request, FetchAndSyncWeatherForecastDataAction $fetchAndSyncWeatherForecastDataAction): JsonResponse
    {
        $weatherForecast = $fetchAndSyncWeatherForecastDataAction->execute(City::all(), Carbon::parse($request->validated()['date']));
        return response()->json(WeatherForecastResource::collection($weatherForecast), Response::HTTP_OK);
    }

    /**
     * @param DeleteWeatherForecastRequest $request
     * @return JsonResponse
     */
    public function destroy(DeleteWeatherForecastRequest $request): JsonResponse
    {
        WeatherForecast::query()->where('date', Carbon::parse($request->validated()['date']))->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
