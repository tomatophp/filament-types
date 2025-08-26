<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Form\Components;

use Filament\Forms;
use Filament\Forms\Components\Field;
use Filament\Schemas\Components\Utilities\Set;
use TomatoPHP\FilamentTypes\Facades\FilamentTypes;

class TypeFor extends Component
{
    public static function make(): Field
    {
        return Forms\Components\Select::make('for')
            ->label(trans('filament-types::messages.form.for'))
            ->options(FilamentTypes::get()->pluck('label', 'for')->toArray())
            ->searchable()
            ->afterStateUpdated(function (Set $set) {
                $set('type', null);
                $set('parent_id', null);
            })
            ->live()
            ->required();
    }
}
