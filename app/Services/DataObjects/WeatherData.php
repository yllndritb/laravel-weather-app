<?php

declare(strict_types=1);

namespace App\Services\DataObjects;

use App\Infrastructure\Services\DataObjects\DataObjectContract;

class WeatherData implements DataObjectContract
{
    public function __construct(
        public int    $id,
        public string $main,
        public string $description,
        public string $icon,
    )
    {
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'main' => $this->main,
            'description' => $this->description,
            'icon' => $this->icon,
        ];
    }
}
