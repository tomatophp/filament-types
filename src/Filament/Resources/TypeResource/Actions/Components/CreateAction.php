<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Actions\Components;

use Filament\Actions;
use Filament\Notifications\Notification;
use TomatoPHP\FilamentTypes\Models\Type;

class CreateAction extends Action
{
    public static function make(): Actions\Action
    {
        return Actions\CreateAction::make()
            ->label(trans('filament-types::messages.create'))
            ->using(function (array $data) {
                $checkExistsType = Type::query()
                    ->where('key', $data['key'])
                    ->where('for', $data['for'])
                    ->where('type', $data['type'])
                    ->first();

                if ($checkExistsType) {
                    Notification::make()
                        ->title(trans('filament-types::messages.exists'))
                        ->danger()
                        ->send();

                    return $checkExistsType;

                } else {
                    $type = Type::create($data);

                    Notification::make()
                        ->title(trans('filament-types::messages.success'))
                        ->success()
                        ->send();

                    return $type;
                }
            })
            ->successNotification(null);
    }
}
