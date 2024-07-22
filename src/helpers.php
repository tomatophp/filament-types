<?php

if(!function_exists('type_of')) {
    function type_of(string $key, string $for, string $type) : \TomatoPHP\FilamentTypes\Models\Type|null
    {
        return \TomatoPHP\FilamentTypes\Models\Type::query()
            ->where('key', $key)
            ->where('for', $for)
            ->where('type', $type)
            ->first();
    }
}
