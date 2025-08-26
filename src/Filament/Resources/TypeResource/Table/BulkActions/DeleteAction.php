<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\BulkActions;

use Filament\Actions;

class DeleteAction extends Action
{
    public static function make(): Actions\DeleteBulkAction
    {
        return Actions\DeleteBulkAction::make();
    }
}
