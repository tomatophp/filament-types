<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\Filters;

use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use TomatoPHP\FilamentTypes\Facades\FilamentTypes;
use TomatoPHP\FilamentTypes\Models\Type;

class TypeFor extends Filter
{
    public static function make(): \Filament\Tables\Filters\BaseFilter
    {
        return Tables\Filters\Filter::make('for')
            ->form([
                Forms\Components\Select::make('for')
                    ->label(trans('filament-types::messages.form.for'))
                    ->options(FilamentTypes::get()->pluck('label', 'for')->toArray())
                    ->searchable()
                    ->preload()
                    ->afterStateUpdated(function (Forms\Set $set) {
                        $set('type', null);
                        $set('parent_id', null);
                    })
                    ->live(),
                Forms\Components\Select::make('type')
                    ->label(trans('filament-types::messages.form.type'))
                    ->options(fn (Forms\Get $get) => $get('for') ? collect(FilamentTypes::get()->where('for', $get('for'))->first()?->types)->pluck('label', 'type')->toArray() : [])
                    ->searchable(),
                Forms\Components\Select::make('parent_id')
                    ->label(trans('filament-types::messages.form.parent_id'))
                    ->options(
                        fn (Forms\Get $get) => Type::whereNull('parent_id')
                            ->where('for', $get('for'))
                            ->where('type', $get('type'))
                            ->get()
                            ->pluck('name', 'id')
                            ->toArray()
                    )
                    ->searchable()
                    ->live(),
            ])
            ->query(function (Builder $query, array $data): Builder {
                if (isset($data['for']) && ! empty($data['for'])) {
                    $query->where('for', $data['for']);
                }
                if (isset($data['type']) && ! empty($data['type'])) {
                    $query->where('type', $data['type']);
                }
                if (isset($data['parent_id']) && ! empty($data['parent_id'])) {
                    $query->where('parent_id', $data['parent_id']);
                }

                return $query;
            });
    }
}
