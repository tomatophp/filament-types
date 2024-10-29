<?php

namespace TomatoPHP\FilamentTypes\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use TomatoPHP\FilamentIcons\Components\IconPicker;
use TomatoPHP\FilamentTranslationComponent\Components\Translation;
use TomatoPHP\FilamentTypes\Components\TypeColumn;
use TomatoPHP\FilamentTypes\Models\Type;

class BaseTypePage extends Page implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public array $data = [];

    protected static string $view = 'filament-types::pages.base';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function getBackUrl()
    {
        return url()->previous();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('create')
                ->label(trans('filament-types::messages.create'))
                ->form([
                    Grid::make([
                        'md' => 2,
                        'sm' => 1,
                    ])->schema([
                        Translation::make('name')
                            ->columnSpanFull()
                            ->label(trans('filament-types::messages.form.name')),
                        TextInput::make('key')
                            ->columnSpanFull()
                            ->required()
                            ->label(trans('filament-types::messages.form.key')),
                        IconPicker::make('icon')
                            ->label(trans('filament-types::messages.form.icon')),
                        ColorPicker::make('color')
                            ->label(trans('filament-types::messages.form.color')),
                    ]),
                ])
                ->action(function (array $data) {
                    $data['for'] = $this->getFor();
                    $data['type'] = $this->getType();
                    Type::create($data);

                    Notification::make()
                        ->title(trans('filament-types::messages.notification.create.title'))
                        ->body(trans('filament-types::messages.notification.create.title'))
                        ->success()
                        ->send();
                }),
            Action::make('back')
                ->label(trans('filament-types::messages.back'))
                ->url(fn () => $this->getBackUrl())
                ->color('warning')
                ->icon('heroicon-s-arrow-left'),
        ];
    }

    public function getType(): string
    {
        return 'status';
    }

    public function getFor(): string
    {
        return 'types';
    }

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected array $types = [];

    public function getTypes(): array
    {
        return [];
    }

    public function mount(): void
    {
        foreach ($this->getTypes() as $type) {
            $exists = Type::query()
                ->where('for', $this->getFor())
                ->where('type', $this->getType())
                ->where('key', $type->key)
                ->first();
            if (! $exists) {
                $type->for = $this->getFor();
                $type->type = $this->getType();
                if (! is_array($type->name)) {
                    $type->name = [
                        app()->getLocale() => $type->name,
                    ];
                }
                Type::create($type->toArray());
            }
        }
    }

    public function getTitle(): string
    {
        return trans('filament-types::messages.base.title');
    }

    public function getCreateAction(): bool
    {
        return true;
    }

    public function table(Table $table): Table
    {
        return $table
            ->deferLoading()
            ->query(
                Type::query()
                    ->where('for', $this->getFor())
                    ->where('type', $this->getType())
            )
            ->paginated(false)
            ->columns([
                TypeColumn::make('key')
                    ->for($this->getFor())
                    ->type($this->getType())
                    ->label(trans('filament-types::messages.form.key')),
            ])
            ->actions([
                \Filament\Tables\Actions\Action::make('edit')
                    ->label(trans('filament-types::messages.edit'))
                    ->tooltip(trans('filament-types::messages.edit'))
                    ->form([
                        Grid::make([
                            'md' => 2,
                            'sm' => 1,
                        ])->schema([
                            Translation::make('name')
                                ->columnSpanFull()
                                ->label(trans('filament-types::messages.form.name')),
                            IconPicker::make('icon')
                                ->label(trans('filament-types::messages.form.icon')),
                            ColorPicker::make('color')
                                ->label(trans('filament-types::messages.form.color')),
                        ]),
                    ])
                    ->extraModalFooterActions([
                        \Filament\Tables\Actions\Action::make('deleteType')
                            ->requiresConfirmation()
                            ->color('danger')
                            ->label(trans('filament-types::messages.delete'))
                            ->cancelParentActions()
                            ->action(function (array $data, $record) {
                                foreach ($this->getTypes() as $getType) {
                                    if ($getType->key == $record->key) {
                                        Notification::make()
                                            ->title(trans('filament-types::messages.notification.error.title'))
                                            ->body(trans('filament-types::messages.notification.error.body'))
                                            ->danger()
                                            ->send();

                                        return;
                                    }
                                }

                                $record->delete();
                                Notification::make()
                                    ->title(trans('filament-types::messages.notification.delete.title'))
                                    ->body(trans('filament-types::messages.notification.delete.body'))
                                    ->success()
                                    ->send();
                            }),
                    ])
                    ->fillForm(fn ($record) => $record->toArray())
                    ->icon('heroicon-s-pencil-square')
                    ->iconButton()
                    ->action(function (array $data, Type $type) {
                        $type->update($data);
                        Notification::make()
                            ->title(trans('filament-types::messages.notification.edit.title'))
                            ->body(trans('filament-types::messages.notification.edit.body'))
                            ->success()
                            ->send();
                    }),
            ]);
    }
}
