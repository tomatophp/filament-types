<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Form\Components;

use Filament\Forms;
use Filament\Forms\Components\Field;

class IsActive extends Component
{
    public static function make(): Field
    {
        return Forms\Components\Toggle::make('is_activated')
            ->label(trans('filament-types::messages.form.is_activated'));
    }
}
