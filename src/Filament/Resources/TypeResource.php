<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources;

use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Form\TypeForm;
use TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\TypeTable;
use TomatoPHP\FilamentTypes\Models\Type;
use Filament\Facades\Filament;

class TypeResource extends Resource
{
    use Translatable;

    protected static ?string $model = Type::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function getTranslatableLocales(): array
    {
        return filament('filament-types')->getLocals();
    }

    public static function getNavigationLabel(): string
    {
        return trans('filament-types::messages.title');
    }

    public static function getLabel(): ?string
    {
        return trans('filament-types::messages.single');
    }

    public static function getPluralLabel(): ?string
    {
        return trans('filament-types::messages.title');
    }

    public static function getNavigationGroup(): ?string
    {
        return trans('filament-types::messages.group');
    }

    /**
     * Config Item: `panel_navigation`
     * Returns: bool
     * 
     * Accepts: array OR bool
     * 
     * Compares against current panel ID based on what is in the array (if provided).
     */
    public static function shouldRegisterNavigation(): bool
    {
        $configItem = config('filament-types.panel_navigation', TRUE);

        if (is_array($configItem) && !empty($configItem)) {
            foreach (config('filament-types.panel_navigation', true) as $key => $val) {
                if (Filament::getCurrentPanel()->getId() === $key) {
                    return $val;
                } else {
                    return FALSE;
                }
            }
        } else {
            return (empty($configItem)) ? FALSE : $configItem;
        }
    }

    public static function form(Form $form): Form
    {
        return TypeForm::make($form);
    }

    public static function table(Table $table): Table
    {
        return TypeTable::make($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Pages\ListTypes::route('/'),
        ];
    }
}
