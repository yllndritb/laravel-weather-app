<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class WeatherForecastResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'date' => $this->date,
            'city' => $this->city,
            'lat' => $this->lat,
            'lon' => $this->lon,
            'open_weather_api_data' => new OpenWeatherMapResource($this->open_weather_api_data),
        ];
    }
}
