<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Form\Components;

use Filament\Forms;
use Filament\Forms\Components\Field;

class Color extends Component
{
    public static function make(): Field
    {
        return Forms\Components\ColorPicker::make('color')
            ->required()
            ->label(trans('filament-types::messages.form.color'));
    }
}
