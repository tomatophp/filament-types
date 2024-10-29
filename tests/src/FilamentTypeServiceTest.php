<?php

use TomatoPHP\FilamentTypes\Facades\FilamentTypes;
use TomatoPHP\FilamentTypes\Services\Contracts\Type;
use TomatoPHP\FilamentTypes\Services\Contracts\TypeFor;
use TomatoPHP\FilamentTypes\Services\Contracts\TypeOf;

it('can register new type from provider', function () {
    FilamentTypes::register([
        TypeFor::make('testingFor')
            ->label('Testing For')
            ->types([
                TypeOf::make('testingType')
                    ->label('Testing Type')
                    ->register([
                        Type::make('testing-key')
                            ->name('Testing Key')
                            ->icon('heroicon-o-adjustments-horizontal')
                            ->color('warning'),
                    ]),
            ]),
    ]);

    expect((bool) FilamentTypes::get()->where('for', 'testingFor')->first())->toBeTrue();
});
