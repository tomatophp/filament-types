<?php

namespace TomatoPHP\FilamentTypes\Components;

use Filament\Support\Concerns\HasLineClamp;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\Concerns;

class TypeColumn extends TextColumn
{
    public ?string $for = null;
    public ?string $type = null;

    protected string $view = 'filament-types::columns.type-column';

    public function getFor(): ?string
    {
        return (string) $this->evaluate($this->for);
    }

    public function getType(): ?string
    {
        return (string) $this->evaluate($this->type);
    }

    public function for(string $for): static
    {
        $this->for = $for;
        return $this;
    }

    public function type(string $type): static
    {
        $this->type = $type;
        return $this;
    }
}
