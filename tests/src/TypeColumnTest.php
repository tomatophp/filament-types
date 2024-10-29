<?php

namespace TomatoPHP\FilamentTypes\Tests;

use TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Pages;
use TomatoPHP\FilamentTypes\Tests\Models\Type;
use TomatoPHP\FilamentTypes\Tests\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;

beforeEach(function () {
    actingAs(User::factory()->create());
});

it('can render type column', function () {
    Type::factory()->count(10)->create();

    livewire(Pages\ListTypes::class)
        ->loadTable()
        ->assertCanRenderTableColumn('key');
});
