<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use TomatoPHP\FilamentTypes\Facades\FilamentTypes;
use TomatoPHP\FilamentTypes\Filament\Resources\TypeResource;
use TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Actions\Components;

class ListTypes extends ManageRecords
{
    public ?string $activeLocale = null;

    public function getTitle(): string
    {
        return trans('filament-types::messages.title');
    }

    protected static string $resource = TypeResource::class;

    protected function getHeaderActions(): array
    {
        return array_merge(
            [
                Components\CreateAction::make(),
            ],
            FilamentTypes::getPageActions(self::class)
        );
    }
}
