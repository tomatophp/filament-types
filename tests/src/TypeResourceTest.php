<?php

namespace TomatoPHP\FilamentTypes\Tests;

use Filament\Tables\Actions\EditAction;
use TomatoPHP\FilamentTypes\Facades\FilamentTypes;
use TomatoPHP\FilamentTypes\Filament\Resources\TypeResource;
use TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Pages;
use TomatoPHP\FilamentTypes\Tests\Models\Type;
use TomatoPHP\FilamentTypes\Tests\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertModelMissing;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

beforeEach(function () {
    actingAs(User::factory()->create());
});

it('can render type resource', function () {
get(TypeResource::getUrl())->assertSuccessful();
    });

it('can list types', function () {
    Type::query()->delete();
    $types = Type::factory()->count(10)->create();

    livewire(Pages\ListTypes::class)
        ->loadTable()
        ->assertCanSeeTableRecords($types)
        ->assertCountTableRecords(12);
});

it('can render type type/for/key column in table', function () {
    Type::factory()->count(10)->create();

    livewire(Pages\ListTypes::class)
        ->loadTable()
        ->assertCanRenderTableColumn('type')
        ->assertCanRenderTableColumn('for')
        ->assertCanRenderTableColumn('key');
});

it('can render type list page', function () {
    livewire(Pages\ListTypes::class)->assertSuccessful();
});

it('can render view type page', function () {
    livewire(Pages\ListTypes::class, [
        'record' => User::factory()->create(),
    ])
        ->mountAction('view')
        ->assertSuccessful();
});

it('can render type create page', function () {
    livewire(Pages\ListTypes::class)
        ->mountAction('create')
        ->assertSuccessful();
});

it('can create new type', function () {
    $newData = Type::factory()->make();

    livewire(Pages\ListTypes::class)
        ->callAction('create', data: [
            'order' => $newData->order,
            'for' => $newData->for,
            'name' => $newData->name,
            'key' => $newData->key,
            'type' => $newData->type,
            'description' => $newData->description,
            'color' => $newData->color,
            'icon' => 'heroicon-o-user',
        ])
        ->assertHasNoActionErrors();

    assertDatabaseHas(Type::class, [
        'for' => $newData->for,
        'key' => $newData->key,
        'type' => $newData->type,
    ]);
});

it('can validate type input', function () {
    livewire(Pages\ListTypes::class)
        ->callAction('create', data: [
            'for' => null,
            'name' => null,
            'key' => null,
            'type' => null,
            'description' => null,
            'color' => null,
            'icon' => null,
        ])
        ->assertHasActionErrors([
            'for' => 'required',
            'name' => 'required',
            'key' => 'required',
            'type' => 'required',
        ]);
});

it('can render type edit page', function () {
    livewire(Pages\ListTypes::class, [
        'record' => Type::factory()->create(),
    ])
        ->mountAction('edit')
        ->assertSuccessful();
});

it('can retrieve type data', function () {
    $type = Type::factory()->create();

    livewire(Pages\ListTypes::class)
        ->mountTableAction(EditAction::class, $type)
        ->assertTableActionDataSet([
            'key' => $type->key,
            'type' => $type->type,
            'for' => $type->for,
        ])
        ->assertHasNoTableActionErrors();
});

it('can validate edit type input', function () {
    $type = Type::factory()->create();

    livewire(Pages\ListTypes::class, [
        'record' => $type->getRouteKey(),
    ])
        ->callTableAction('edit', $type, [
            'name' => null,
            'type' => null,
            'for' => null,
            'key' => null,
        ])
        ->assertHasTableActionErrors([
            'name' => 'required',
            'type' => 'required',
            'for' => 'required',
            'key' => 'required',
        ]);
});

it('can save type data', function () {
    $type = Type::factory()->create();
    $newData = Type::factory()->make();

    livewire(Pages\ListTypes::class)
        ->callTableAction('edit', $type, data: [
            'key' => $newData->key,
            'for' => FilamentTypes::get()->first()?->for,
            'type' => collect(FilamentTypes::get()->first()?->types)->first()?->type,
            'name' => $newData->name,
        ])
        ->assertHasNoTableActionErrors();

    expect($type->refresh())->key->toBe($newData->key);
});

it('can delete type', function () {
    $type = Type::factory()->create();

    livewire(Pages\ListTypes::class)
        ->callTableAction('delete', $type)
        ->assertHasNoTableActionErrors();

    assertModelMissing($type);
});
