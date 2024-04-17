<?php

namespace TomatoPHP\FilamentTypes\Services;

use Illuminate\Support\Collection;

class FilamentTypesRegister
{
    public array $types = [];

    public function register(array|string $type, string $for):void
    {
        $this->types[$for] = [];
        if(is_array($type)){
            foreach ($type as $item){
                $this->types[$for][] = $item;
            }
        }
        else{
            $this->types[$for][] = $type;
        }
    }

    public function getFor(): Collection
    {
        return collect($this->types)->keys();
    }

    public function getTypes(string $for): Collection
    {
        return collect($this->types)->filter(fn($type, $key) => $key === $for);
    }
}
