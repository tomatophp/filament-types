<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Form\Components;

use Filament\Forms\Components\Field;
use TomatoPHP\FilamentIcons\Components\IconPicker;

class Icon extends Component
{
    public static function make(): Field
    {
        return IconPicker::make('icon')
            ->required()
            ->label(trans('filament-types::messages.form.icon'));
    }
}
