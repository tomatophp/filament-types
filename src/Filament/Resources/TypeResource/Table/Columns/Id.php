<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\Columns;

use Filament\Tables;

class Id extends Column
{
    public static function make(): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('id')
            ->sortable();
    }
}
