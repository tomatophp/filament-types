<?php

if(!function_exists('type_of')) {
    function type_of(string $key) : \TomatoPHP\FilamentTypes\Models\Type|null
    {
        $type = \TomatoPHP\FilamentTypes\Models\Type::where('key', $key)->first();
        return $type ?? null;
    }
}
