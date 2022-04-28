<?php

declare(strict_types=1);

namespace App\Infrastructure\Services\DataObjects;

interface DataObjectContract
{
    /**
     * @return array
     */
    public function toArray(): array;
}
