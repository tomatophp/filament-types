<?php

namespace TomatoPHP\FilamentTypes\Tests;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use LaraZeus\SpatieTranslatable\SpatieTranslatablePlugin;
use TomatoPHP\FilamentTypes\FilamentTypesPlugin;
use TomatoPHP\FilamentTypes\Services\Contracts\Type;
use TomatoPHP\FilamentTypes\Services\Contracts\TypeFor;
use TomatoPHP\FilamentTypes\Services\Contracts\TypeOf;
use TomatoPHP\FilamentTypes\Tests\Pages\TypePage;
use TomatoPHP\FilamentTypes\Tests\Pages\TypeViewComponentPage;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->pages([
                Pages\Dashboard::class,
                TypePage::class,
                TypeViewComponentPage::class,
            ])
            ->plugin(
                SpatieTranslatablePlugin::make()
                    ->defaultLocales(['ar', 'en']),
            )
            ->plugin(
                FilamentTypesPlugin::make()
                    ->types([
                        TypeFor::make('products')
                            ->label('Product')
                            ->types([
                                TypeOf::make('sizes')
                                    ->label('Sizes')
                                    ->register([
                                        Type::make('xl')
                                            ->name('XL')
                                            ->icon('heroicon-o-adjustments-horizontal')
                                            ->color('warning'),
                                    ]),
                            ]),
                    ]),
            )
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
