<?php

declare(strict_types=1);

namespace App\Casts;

use App\Services\DataObjects\OpenWeatherApiData;
use App\Services\Factories\OpenWeatherApiFactory;
use Exception;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

final class OpenWeatherApiCast implements CastsAttributes
{
    /**
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return OpenWeatherApiData|null
     */
    public function get($model, $key, $value, $attributes): ?OpenWeatherApiData
    {
        if (!$value) {
            return null;
        }
        return OpenWeatherApiFactory::make(json_decode($value, true));
    }

    /**
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return string
     * @throws Exception
     */
    public function set($model, $key, $value, $attributes): string
    {
        if (!$value instanceof OpenWeatherApiData) {
            throw new Exception("The provided value must be an instance of " . OpenWeatherApiData::class);
        }
        return json_encode($value->toArray());
    }
}
