<?php

declare(strict_types=1);

namespace App\Services\DataObjects;

use App\Infrastructure\Services\DataObjects\DataObjectContract;

class FeelsLikeData implements DataObjectContract
{
    public function __construct(
        public float $day,
        public float $night,
        public float $eve,
        public float $morn,
    )
    {
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'day' => $this->day,
            'night' => $this->night,
            'eve' => $this->eve,
            'morn' => $this->morn,
        ];
    }
}
