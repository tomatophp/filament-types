<?php

use Filament\Facades\Filament;
use Filament\SpatieLaravelTranslatablePlugin;
use TomatoPHP\FilamentTypes\FilamentTypesPlugin;

it('registers spatie laravel translatable plugin', function () {
    $panel = Filament::getCurrentPanel();

    $panel->plugins([
        SpatieLaravelTranslatablePlugin::make(),
    ]);

    expect($panel->getPlugin('spatie-laravel-translatable'))
        ->not()
        ->toThrow(Exception::class);
});

it('registers plugin', function () {
    $panel = Filament::getCurrentPanel();

    $panel->plugins([
        FilamentTypesPlugin::make(),
    ]);

    expect($panel->getPlugin('filament-types'))
        ->not()
        ->toThrow(Exception::class);
});
