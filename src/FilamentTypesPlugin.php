<?php

namespace TomatoPHP\FilamentTypes;

use Filament\Contracts\Plugin;
use Filament\Panel;
use TomatoPHP\FilamentTypes\Resources\TypeResource;
use Filament\SpatieLaravelTranslatablePlugin;


class FilamentTypesPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-types';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->plugin(
                SpatieLaravelTranslatablePlugin::make()
                    ->defaultLocales(['en', 'ar']),
            )
            ->resources([
            TypeResource::class
        ]);

    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return new static();
    }
}
