<?php

declare(strict_types=1);

namespace App\Infrastructure\Actions;

use App\Infrastructure\Services\DataObjects\DataObjectContract;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Collection\Collection;

interface ActionContract
{
    /**
     * @param DataObjectContract $object
     * @return  Model|Collection|null
     */
    public static function handle(DataObjectContract $object): Model|Collection|null;
}
