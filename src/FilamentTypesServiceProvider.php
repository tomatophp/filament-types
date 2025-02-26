<?php

namespace TomatoPHP\FilamentTypes;

use Illuminate\Support\ServiceProvider;

require_once __DIR__ . '/helpers.php';

class FilamentTypesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register generate command
        $this->commands([
            \TomatoPHP\FilamentTypes\Console\FilamentTypesInstall::class,
        ]);

        // Register Config file
        $this->mergeConfigFrom(__DIR__ . '/../config/filament-types.php', 'filament-types');

        // Publish Config
        $this->publishes([
            __DIR__ . '/../config/filament-types.php' => config_path('filament-types.php'),
        ], 'filament-types-config');

        // Register Migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Publish Migrations
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'filament-types-migrations');
        // Register views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'filament-types');

        // Publish Views
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/filament-types'),
        ], 'filament-types-views');

        // Register Langs
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'filament-types');

        // Publish Lang
        $this->publishes([
            __DIR__ . '/../resources/lang' => base_path('lang/vendor/filament-types'),
        ], 'filament-types-lang');

        // Register Routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->app->bind('filament-types', function () {
            return new Services\FilamentTypesServices;
        });

        $this->loadViewComponentsAs('tomato', [
            Components\Type::class,
        ]);
    }

    public function boot(): void
    {
        // you boot methods here
    }
}
