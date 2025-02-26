<?php

use Filament\Tables\Actions\EditAction;
use TomatoPHP\FilamentTypes\Tests\Models\Type;
use TomatoPHP\FilamentTypes\Tests\Models\User;
use TomatoPHP\FilamentTypes\Tests\Pages\TypePage;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

beforeEach(function () {
    actingAs(User::factory()->create());
});

it('can render type page', function () {
get(TypePage::getUrl())->assertSuccessful();
    });

it('can list selected types', function () {
    Type::query()->where('type', 'groups')->where('for', 'notes')->delete();
    Type::query()->create([
        'order' => 1,
        'for' => 'notes',
        'name' => 'TODO',
        'key' => 'todo',
        'type' => 'groups',
        'description' => 'TODO',
        'color' => '#1461e3',
        'icon' => 'heroicon-o-list-bullet',
    ]);
    $types = Type::query()->where('type', 'groups')->where('for', 'notes')->get();

    livewire(TypePage::class)
        ->loadTable()
        ->assertCanSeeTableRecords($types)
        ->assertCountTableRecords(1);
});

it('can render type key column in table', function () {
    Type::factory()->count(10)->create();

    livewire(TypePage::class)
        ->loadTable()
        ->assertCanRenderTableColumn('key');
});

it('can render type create page', function () {
    livewire(TypePage::class)
        ->mountAction('create')
        ->assertSuccessful();
});

it('can create new type', function () {
    $newData = Type::factory()->make();

    livewire(TypePage::class)
        ->callAction('create', data: [
            'name' => $newData->name,
            'key' => $newData->key,
            'color' => $newData->color,
            'icon' => 'heroicon-o-user',
        ])
        ->assertHasNoActionErrors();

    assertDatabaseHas(Type::class, [
        'for' => 'notes',
        'type' => 'groups',
        'key' => $newData->key,
    ]);
});

it('can validate type input', function () {
    livewire(TypePage::class)
        ->callAction('create', data: [
            'name' => null,
            'key' => null,
            'color' => null,
            'icon' => null,
        ])
        ->assertHasActionErrors([
            'key' => 'required',
        ]);
});

it('can render type edit page', function () {
    livewire(TypePage::class, [
        'record' => Type::factory()->create(),
    ])
        ->mountAction('edit')
        ->assertSuccessful();
});

it('can retrieve type data', function () {
    $type = Type::query()->create([
        'order' => 1,
        'for' => 'notes',
        'name' => 'TODO',
        'key' => 'todo',
        'type' => 'groups',
        'description' => 'TODO',
        'color' => '#1461e3',
        'icon' => 'heroicon-o-list-bullet',
    ]);

    livewire(TypePage::class)
        ->mountTableAction(EditAction::class, $type)
        ->assertTableActionDataSet([
            'key' => $type->key,
            'type' => $type->type,
            'for' => $type->for,
        ])
        ->assertHasNoTableActionErrors();
});

it('can save type data', function () {
    $type = Type::query()->create([
        'order' => 1,
        'for' => 'notes',
        'name' => 'TODO',
        'key' => 'todo',
        'type' => 'groups',
        'description' => 'TODO',
        'color' => '#1461e3',
        'icon' => 'heroicon-o-list-bullet',
    ]);

    livewire(TypePage::class)
        ->callTableAction('edit', $type, data: [
            'icon' => 'heroicon-o-user',
        ])
        ->assertHasNoTableActionErrors();

    expect($type->refresh())->icon->toBe('heroicon-o-user');
});
