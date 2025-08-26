<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\Columns;

use Filament\Tables;
use TomatoPHP\FilamentTypes\Models\Type;

class TypeOf extends Column
{
    public static function make(): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('type')
            ->label(trans('filament-types::messages.form.type'))
            ->getStateUsing(fn (Type $record) => str($record->type)->title()->toString())
            ->sortable();
    }
}
