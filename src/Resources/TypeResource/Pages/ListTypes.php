<?php

namespace TomatoPHP\FilamentTypes\Resources\TypeResource\Pages;

use Filament\Actions;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Pages\ManageRecords;
use TomatoPHP\FilamentTypes\Resources\TypeResource;

class ListTypes extends ManageRecords
{
    use ManageRecords\Concerns\Translatable;

    #[Reactive]
    public ?string $activeLocale = null;

    public function getTitle():string
    {
        return trans('filament-types::messages.title');
    }

    protected static string $resource = TypeResource::class;

    public static function getTranslatableLocales(): array
    {
        return ['en', 'ar'];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(trans('filament-types::messages.create')),
            Actions\LocaleSwitcher::make()
        ];
    }
}
