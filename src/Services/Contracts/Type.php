<?php

namespace TomatoPHP\FilamentTypes\Services\Contracts;

class Type
{
    public string $key;

    public array | string $name = [];

    public ?string $icon = null;

    public ?string $color = null;

    public static function make(string $key): static
    {
        return (new self)->key($key);
    }

    public function key(string $key): static
    {
        $this->key = $key;

        return $this;
    }

    public function name(array | string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function icon(string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function color(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'key' => $this->key,
            'name' => $this->name,
            'icon' => $this->icon,
            'color' => $this->color,
        ];
    }
}
