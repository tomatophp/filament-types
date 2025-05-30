<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table;

class TypeFilters
{
    /**
     * @var array
     */
    protected static $filters = [];

    public static function make(): array
    {
        return self::getFilters();
    }

    private static function getDefaultFilters(): array
    {
        return [
            Filters\TypeFor::make(),
        ];
    }

    private static function getFilters(): array
    {
        return array_merge(self::getDefaultFilters(), self::$filters);
    }

    public static function register(\Filament\Tables\Filters\BaseFilter | array $action): void
    {
        if (is_array($action)) {
            foreach ($action as $item) {
                if ($item instanceof \Filament\Tables\Filters\BaseFilter) {
                    self::$filters[] = $item;
                }
            }
        } else {
            self::$filters[] = $action;
        }
    }
}
