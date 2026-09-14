<?php

use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use TomatoPHP\FilamentTypes\Filament\Resources\TypeResource;
use TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Pages\ListTypes;
use TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\TypeActions;
use TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\TypeBulkActions;
use TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\TypeFilters;
use TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\TypeHeaderActions;
use TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\TypeTable;
use TomatoPHP\FilamentTypes\Tests\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;

beforeEach(function () {
    actingAs(User::factory()->create());

    $this->panel->resources([
        TypeResource::class,
    ]);
});

it('registers extra table record actions', function () {
    TypeActions::register(Action::make('hookRecordAction'));
    TypeActions::register([Action::make('hookRecordActionFromArray')]);

    $names = collect(TypeActions::make())->map(fn (Action $action) => $action->getName());

    expect($names)->toContain('hookRecordAction', 'hookRecordActionFromArray');

    livewire(ListTypes::class)->assertTableActionExists('hookRecordAction');
});

it('registers extra table header actions', function () {
    TypeHeaderActions::register(Action::make('hookHeaderAction'));

    $names = collect(TypeHeaderActions::make())->map(fn (Action $action) => $action->getName());

    expect($names)->toContain('hookHeaderAction');
});

it('registers extra table bulk actions', function () {
    TypeBulkActions::register(BulkAction::make('hookBulkAction'));

    $names = collect(TypeBulkActions::make())->map(fn (BulkAction $action) => $action->getName());

    expect($names)->toContain('hookBulkAction');

    livewire(ListTypes::class)->assertTableBulkActionExists('hookBulkAction');
});

it('registers extra table filters and columns', function () {
    TypeFilters::register(SelectFilter::make('hookFilter')->options(['a' => 'A']));
    TypeTable::register(TextColumn::make('description'));

    livewire(ListTypes::class)
        ->assertTableFilterExists('hookFilter')
        ->assertTableColumnExists('description');
});
