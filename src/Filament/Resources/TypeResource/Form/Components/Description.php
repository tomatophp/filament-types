<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Form\Components;

use Filament\Forms;
use Filament\Forms\Components\Field;

class Description extends Component
{
    public static function make(): Field
    {
        return Forms\Components\Textarea::make('description')
            ->label(trans('filament-types::messages.form.description'))
            ->columnSpanFull();
    }
}
