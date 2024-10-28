<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\Columns;

abstract class Column
{
    abstract public static function make(): \Filament\Tables\Columns\Column;
}
