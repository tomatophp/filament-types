<?php

namespace TomatoPHP\FilamentTypes;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\SpatieLaravelTranslatablePlugin;
use TomatoPHP\FilamentTypes\Filament\Resources\TypeResource;

class FilamentTypesPlugin implements Plugin
{
    protected array $locals = ['ar', 'en'];

    protected static array $types = [];

    /**
     * @return $this
     */
    public function locals()
    {
        return (! is_null(config('filament-types.locals'))) ? config('filament-types.locals') : $this->locals;
    }

    public function getLocals(): array
    {
        return $this->locals();
    }

    /**
     * @return $this
     */
    public function types(array $types): self
    {
        self::$types = $types;

        return $this;
    }

    public function getTypes(): array
    {
        return self::$types;
    }

    public function getId(): string
    {
        return 'filament-types';
    }

    public function register(Panel $panel): void
    {
        if (! $panel->hasPlugin('spatie-laravel-translatable')) {
            $panel->plugin(
                SpatieLaravelTranslatablePlugin::make()
                    ->defaultLocales($this->getLocals()),
            );
        }

        $panel->resources([
            TypeResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): FilamentTypesPlugin
    {
        return new FilamentTypesPlugin;
    }
}
