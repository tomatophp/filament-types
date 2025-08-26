<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Form\Components;

use Filament\Forms\Components\Field;
use TomatoPHP\FilamentTranslationComponent\Components\Translation;

class Name extends Component
{
    public static function make(): Field
    {
        return Translation::make('name')
            ->label(trans('filament-types::messages.form.name'))
            ->columnSpanFull()
            ->lang(filament('filament-types')->getLocals())
            ->required();
    }
}
