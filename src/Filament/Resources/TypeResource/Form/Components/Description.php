<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Form\Components;

use Filament\Forms\Components\Field;
use TomatoPHP\FilamentTranslationComponent\Components\Translation;

class Description extends Component
{
    public static function make(): Field
    {
        return Translation::make('description')
            ->textarea()
            ->label(trans('filament-types::messages.form.description'))
            ->lang(filament('filament-types')->getLocals())
            ->columnSpanFull();
    }
}
