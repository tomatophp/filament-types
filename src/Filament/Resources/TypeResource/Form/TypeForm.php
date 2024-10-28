<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Form;

use Filament\Forms\Components\Field;
use Filament\Forms\Form;

class TypeForm
{
    protected static array $schema = [];

    public static function make(Form $form): Form
    {
        return $form->schema(self::getSchema())->columns(2);
    }

    public static function getDefaultComponents(): array
    {
        return [
            Components\Image::make(),
            Components\TypeFor::make(),
            Components\TypeOf::make(),
            Components\Name::make(),
            Components\Key::make(),
            Components\Description::make(),
            Components\Icon::make(),
            Components\Color::make(),
            Components\IsActive::make(),
        ];
    }

    private static function getSchema(): array
    {
        return array_merge(self::getDefaultComponents(), self::$schema);
    }

    public static function register(Field | array $component): void
    {
        if (is_array($component)) {
            foreach ($component as $item) {
                if ($item instanceof Field) {
                    self::$schema[] = $item;
                }
            }

        } else {
            self::$schema[] = $component;
        }
    }
}
