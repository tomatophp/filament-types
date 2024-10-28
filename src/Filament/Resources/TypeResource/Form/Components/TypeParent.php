<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Form\Components;

use Filament\Forms;
use Filament\Forms\Components\Field;
use TomatoPHP\FilamentTypes\Models\Type;

class TypeParent extends Component
{
    public static function make(): Field
    {
        return Forms\Components\Select::make('parent_id')
            ->label(trans('filament-types::messages.form.parent_id'))
            ->columnSpan(2)
            ->options(Type::whereNull('parent_id')
                ->get()
                ->pluck('name', 'id')
                ->toArray())
            ->searchable()
            ->live();
    }
}
