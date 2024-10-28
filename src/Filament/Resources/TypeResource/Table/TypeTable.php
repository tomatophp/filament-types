<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table;

use Filament\Tables;
use Filament\Tables\Columns\Column;
use Filament\Tables\Table;

class TypeTable
{
    protected static array $columns = [];

    public static function make(Table $table): Table
    {
        return $table
            ->deferLoading()
            ->bulkActions(TypeBulkActions::make())
            ->actions(TypeActions::make())
            ->filters(TypeFilters::make())
            ->headerActions(TypeHeaderActions::make())
            ->groups([
                Tables\Grouping\Group::make('for'),
                Tables\Grouping\Group::make('type'),
            ])
            ->deferLoading()
            ->defaultGroup('for')
            ->defaultSort('order')
            ->reorderable('order')
            ->columns(self::getColumns());
    }

    public static function getDefaultColumns(): array
    {
        return [
            Columns\TypeFor::make(),
            Columns\TypeOf::make(),
            Columns\Key::make(),
            Columns\IsActive::make(),
            Columns\CreatedAt::make(),
            Columns\UpdatedAt::make(),
        ];
    }

    private static function getColumns(): array
    {
        return array_merge(self::getDefaultColumns(), self::$columns);
    }

    public static function register(Column | array $column): void
    {
        if (is_array($column)) {
            foreach ($column as $item) {
                if ($item instanceof Column) {
                    self::$columns[] = $item;
                }
            }
        } else {
            self::$columns[] = $column;
        }
    }
}
