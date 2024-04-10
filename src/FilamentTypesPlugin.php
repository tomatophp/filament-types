<?php

namespace TomatoPHP\FilamentTypes;

use Filament\Contracts\Plugin;
use Filament\Panel;


class FilamentTypesPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-types';
    }

    public function register(Panel $panel): void
    {
        $panel->pages([

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
