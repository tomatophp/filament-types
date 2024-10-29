<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\Columns;

use Filament\Tables;

class IsActive extends Column
{
    public static function make(): Tables\Columns\ToggleColumn
    {
        return Tables\Columns\ToggleColumn::make('is_activated')
            ->label(trans('filament-types::messages.form.is_activated'));
    }
}
