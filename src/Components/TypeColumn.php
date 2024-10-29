<?php

namespace TomatoPHP\FilamentTypes\Components;

use Filament\Tables\Columns\TextColumn;

class TypeColumn extends TextColumn
{
    public string | \Closure | null $for = null;

    public string | \Closure | null $type = null;

    public bool | \Closure | null $allowDescription = false;

    protected string $view = 'filament-types::columns.type-column';

    public function getFor(): ?string
    {
        return (string) $this->evaluate($this->for);
    }

    public function getType(): ?string
    {
        return (string) $this->evaluate($this->type);
    }

    public function for(string | \Closure $for): static
    {
        $this->for = $for;

        return $this;
    }

    public function type(string | \Closure $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function allowDescription(bool | \Closure $allowDescription = true): static
    {
        $this->allowDescription = $allowDescription;

        return $this;
    }

    public function getAllowDescription(): bool
    {
        return (bool) $this->evaluate($this->allowDescription);
    }
}
