<?php

use Filament\Facades\Filament;
use LaraZeus\SpatieTranslatable\SpatieTranslatablePlugin;
use TomatoPHP\FilamentTypes\FilamentTypesPlugin;

it('registers spatie laravel translatable plugin', function () {
    $panel = Filament::getCurrentOrDefaultPanel();

    $panel->plugins([
        SpatieTranslatablePlugin::make(),
    ]);

    expect($panel->getPlugin('spatie-translatable'))
        ->not()
        ->toThrow(Exception::class);
});

it('registers plugin', function () {
    $panel = Filament::getCurrentOrDefaultPanel();

    $panel->plugins([
        FilamentTypesPlugin::make(),
    ]);

    expect($panel->getPlugin('filament-types'))
        ->not()
        ->toThrow(Exception::class);
});
