<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Form\Components;

use Filament\Forms;
use Filament\Forms\Components\Field;

class Image extends Component
{
    public static function make(): Field
    {
        return Forms\Components\SpatieMediaLibraryFileUpload::make('image')
            ->label(trans('filament-types::messages.form.image'))
            ->columnSpan(2)
            ->collection('image')
            ->image()
            ->maxFiles(1);
    }
}
