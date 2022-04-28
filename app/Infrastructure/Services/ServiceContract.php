<?php

declare(strict_types=1);

namespace App\Infrastructure\Services;

use Illuminate\Http\Client\PendingRequest;

interface ServiceContract
{
    /**
     * @return PendingRequest
     */
    public function makeRequest(): PendingRequest;
}
