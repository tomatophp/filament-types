<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Form\Components;

use Filament\Forms;
use Filament\Forms\Components\Field;

class Name extends Component
{
    public static function make(): Field
    {
        return Forms\Components\TextInput::make('name')
            ->label(trans('filament-types::messages.form.name'))
            ->required()
            ->maxLength(255);
    }
}
