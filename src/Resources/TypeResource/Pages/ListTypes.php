<?php

namespace TomatoPHP\FilamentTypes\Resources\TypeResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Validation\ValidationException;
use TomatoPHP\FilamentTypes\Models\Type;
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
            Actions\CreateAction::make()
                ->label(trans('filament-types::messages.create'))
                ->using(function (array $data) {
                    $checkExistsType = Type::query()
                        ->where('key', $data['key'])
                        ->where('for', $data['for'])
                        ->where('type', $data['type'])
                        ->first();

                    if($checkExistsType){
                        Notification::make()
                            ->title(trans('filament-types::messages.exists'))
                            ->danger()
                            ->send();
                        return $checkExistsType;

                    }
                    else {
                        $type = Type::create($data);

                        Notification::make()
                            ->title(trans('filament-types::messages.success'))
                            ->success()
                            ->send();

                        return $type;
                    }
                })
                ->successNotification(null),
            Actions\LocaleSwitcher::make()
        ];
    }
}
