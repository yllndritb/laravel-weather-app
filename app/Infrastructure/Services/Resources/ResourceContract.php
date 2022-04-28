<?php

declare(strict_types=1);

namespace App\Infrastructure\Services\Resources;

use App\Infrastructure\Services\ServiceContract;

interface ResourceContract
{
    /**
     * @return ServiceContract
     */
    public function service(): ServiceContract;
}
