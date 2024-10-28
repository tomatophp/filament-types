<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\BulkActions;

use Filament\Tables\Actions\BulkAction;

abstract class Action
{
    abstract public static function make(): BulkAction;
}
