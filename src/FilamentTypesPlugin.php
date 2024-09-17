<?php

namespace TomatoPHP\FilamentTypes;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Nwidart\Modules\Module;
use TomatoPHP\FilamentTypes\Resources\TypeResource;
use Filament\SpatieLaravelTranslatablePlugin;


class FilamentTypesPlugin implements Plugin
{
    private bool $isActive = false;

    public function getId(): string
    {
        return 'filament-types';
    }

    public function register(Panel $panel): void
    {
        if(class_exists(Module::class) && \Nwidart\Modules\Facades\Module::find('FilamentTypes')?->isEnabled()){
            $this->isActive = true;
        }
        else {
            $this->isActive = true;
        }

        if($this->isActive) {
            $panel
                ->plugin(
                    SpatieLaravelTranslatablePlugin::make()
                        ->defaultLocales(['en', 'ar']),
                )
                ->resources([
                    TypeResource::class
                ]);
        }

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
