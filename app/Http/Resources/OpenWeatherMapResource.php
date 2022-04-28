<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class OpenWeatherMapResource extends JsonResource
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
            'dt' => $this->dt,
            'sunrise' => $this->sunrise,
            'sunset' => $this->sunset,
            'moonrise' => $this->moonrise,
            'moonset' => $this->moonset,
            'moon_phase' => $this->moon_phase,
            'pressure' => $this->pressure,
            'humidity' => $this->humidity,
            'dew_point' => $this->dew_point,
            'wind_speed' => $this->wind_speed,
            'wind_deg' => $this->wind_deg,
            'wind_gust' => $this->wind_gust,
            'clouds' => $this->clouds,
            'pop' => $this->pop,
            'uvi' => $this->uvi,
            'temp' => new TemperatureResource($this->temp),
            'feels_like' => new FeelsLikeResource($this->feels_like),
            'weather' => WeatherResource::collection($this->weather),
        ];
    }
}
