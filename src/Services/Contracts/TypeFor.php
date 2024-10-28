<?php

namespace TomatoPHP\FilamentTypes\Services\Contracts;

class TypeFor
{
    public ?string $label = null;

    public string $for;

    public array $types = [];

    public static function make(string $for): static
    {
        return (new self)->for($for);
    }

    public function label(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function for(string $for): static
    {
        $this->for = $for;

        return $this;
    }

    public function types(array $types): static
    {
        $this->types = $types;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'label' => $this->label ?: str($this->for)->title()->toString(),
            'for' => $this->for,
            'types' => $this->types,
        ];
    }
}
