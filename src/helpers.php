<?php

if (! function_exists('type_of')) {
    function type_of(string $key, string $for, string $type): ?\TomatoPHP\FilamentTypes\Models\Type
    {
        return \TomatoPHP\FilamentTypes\Models\Type::query()
            ->where('key', $key)
            ->where('for', 'LIKE', '%' . $for . '%')
            ->where('type', 'LIKE', '%' . $type . '%')
            ->first();
    }
}
