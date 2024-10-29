<?php

namespace TomatoPHP\FilamentTypes\Services\Contracts;

class TypeOf
{
    public ?string $label = null;

    public string $type;

    public array $types = [];

    public static function make(string $type): static
    {
        return (new self)->type($type);
    }

    public function label(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function type(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function register(array $types): static
    {
        $this->types = $types;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'label' => $this->label ?: str($this->type)->title()->toString(),
            'type' => $this->type,
            'types' => $this->types,
        ];
    }
}
