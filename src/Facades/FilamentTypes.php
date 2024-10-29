<?php

namespace TomatoPHP\FilamentTypes\Facades;

use Illuminate\Support\Facades\Facade;
use TomatoPHP\FilamentTypes\Services\Contracts\TypeFor;

/**
 * @method static void register(array|TypeFor $types)
 * @method static \Illuminate\Support\Collection get()
 */
class FilamentTypes extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-types';
    }
}
