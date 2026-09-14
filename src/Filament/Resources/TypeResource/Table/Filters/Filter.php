<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\Filters;

use Filament\Tables\Filters\BaseFilter;

abstract class Filter
{
    abstract public static function make(): BaseFilter;
}
