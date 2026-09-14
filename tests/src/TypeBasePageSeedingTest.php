<?php

use TomatoPHP\FilamentTypes\Models\Type;
use TomatoPHP\FilamentTypes\Tests\Models\User;
use TomatoPHP\FilamentTypes\Tests\Pages\TypePage;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;

beforeEach(function () {
    actingAs(User::factory()->create());
});

it('seeds the page types under the page for and type', function () {
    livewire(TypePage::class)->assertSuccessful();

    $keys = Type::query()
        ->where('for', 'notes')
        ->where('type', 'groups')
        ->pluck('key')
        ->sort()
        ->values()
        ->all();

    expect($keys)->toBe(['ideas', 'saved', 'todo']);
});

it('does not duplicate the page types on every visit', function () {
    livewire(TypePage::class)->assertSuccessful();
    livewire(TypePage::class)->assertSuccessful();

    expect(Type::query()->whereIn('key', ['todo', 'ideas', 'saved'])->count())->toBe(3);
});

it('shows the seeded types in the page table', function () {
    livewire(TypePage::class)
        ->loadTable()
        ->assertCountTableRecords(3);
});
