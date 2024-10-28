<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\Filters;

abstract class Filter
{
    abstract public static function make(): \Filament\Tables\Filters\BaseFilter;
}
