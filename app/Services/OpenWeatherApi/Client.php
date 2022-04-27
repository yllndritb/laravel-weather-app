<?php

declare(strict_types=1);

namespace App\Services\OpenWeatherApi;

use App\Services\Concerns\HasFake;
use Illuminate\Support\Facades\Http;

class Client
{
    use HasFake;

    public function __construct(
        protected string $uri,
        protected string $token,
    )
    {
    }


    public function monitors()
    {
        $request = Http::withToken(
            $this->token,
        );

        $response = $request->get(
            "{$this->uri}?q=London",
        );

        if (!$response->successful()) {
            return $response->toException();
        }

        return $response;
    }
}
