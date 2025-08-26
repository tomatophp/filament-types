<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Form\Components;

use Filament\Forms;
use Filament\Forms\Components\Field;
use Filament\Schemas\Components\Utilities\Get;
use TomatoPHP\FilamentTypes\Facades\FilamentTypes;

class TypeOf extends Component
{
    public static function make(): Field
    {
        return Forms\Components\Select::make('type')
            ->label(trans('filament-types::messages.form.type'))
            ->options(function (Get $get) {
                return $get('for') ? collect(FilamentTypes::get()->where('for', $get('for'))->first()?->types)->pluck('label', 'type')->toArray() : [];
            })
            ->searchable()
            ->required();
    }
}
