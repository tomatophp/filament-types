<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\BulkActions;

use Filament\Tables;

class DeleteAction extends Action
{
    public static function make(): Tables\Actions\DeleteBulkAction
    {
        return Tables\Actions\DeleteBulkAction::make();
    }
}
