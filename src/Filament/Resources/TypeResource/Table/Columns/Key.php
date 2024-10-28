<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\Columns;

use TomatoPHP\FilamentTypes\Components\TypeColumn;

class Key extends Column
{
    public static function make(): TypeColumn
    {
        return TypeColumn::make('key')
            ->for(fn ($record) => $record->for)
            ->type(fn ($record) => $record->type)
            ->label(trans('filament-types::messages.form.key'))
            ->sortable()
            ->searchable();
    }
}
