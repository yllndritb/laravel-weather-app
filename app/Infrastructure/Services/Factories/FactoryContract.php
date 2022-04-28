<?php

declare(strict_types=1);

namespace App\Infrastructure\Services\Factories;

use App\Infrastructure\Services\DataObjects\DataObjectContract;

interface FactoryContract
{
    /**
     * @param array $attributes
     * @return DataObjectContract
     */
    public static function make(array $attributes): DataObjectContract;
}
