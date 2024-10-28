<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Actions;

use Filament\Actions\LocaleSwitcher;

final class ManagePageActions
{
    use Contracts\CanRegister;

    public function getDefaultActions(): array
    {
        return [
            Components\CreateAction::make(),
            LocaleSwitcher::make(),
        ];
    }
}
