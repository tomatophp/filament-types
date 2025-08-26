<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\Actions;

use Filament\Actions;

class EditAction extends Action
{
    public static function make(): Actions\Action
    {
        return Actions\EditAction::make()
            ->iconButton()
            ->tooltip(__('filament-actions::edit.single.label'));
    }
}
