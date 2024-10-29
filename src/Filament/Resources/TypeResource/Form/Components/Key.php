<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Form\Components;

use Filament\Forms;
use Filament\Forms\Components\Field;

class Key extends Component
{
    public static function make(): Field
    {
        return Forms\Components\TextInput::make('key')
            ->label(trans('filament-types::messages.form.key'))
            ->required()
            ->maxLength(255);
    }
}
