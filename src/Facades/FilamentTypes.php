<?php

namespace TomatoPHP\FilamentTypes\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * @method static void register(array|string $type, string $for)
 * @method static \Illuminate\Support\Collection getFor()
 * @method static \Illuminate\Support\Collection getTypes(string $for)
 */
class FilamentTypes extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-types';
    }
}
