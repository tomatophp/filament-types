<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\Columns;

use Filament\Tables;

class TypeFor extends Column
{
    public static function make(): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('for')
            ->label(trans('filament-types::messages.form.for'))
            ->sortable();
    }
}
