<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use TomatoPHP\FilamentTypes\Filament\Resources\TypeResource;

class ListTypes extends ManageRecords
{
    use ManageRecords\Concerns\Translatable;

    public ?string $activeLocale = null;

    public function getTitle(): string
    {
        return trans('filament-types::messages.title');
    }

    protected static string $resource = TypeResource::class;

    protected function getHeaderActions(): array
    {
        return TypeResource\Actions\ManagePageActions::make($this);
    }
}
