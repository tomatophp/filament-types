<?php

use TomatoPHP\FilamentTypes\Models\Type;

if (! function_exists('type_of')) {
    function type_of(string $key, string $for, string $type): ?Type
    {
        return Type::query()
            ->where('key', $key)
            ->where('for', 'LIKE', '%' . $for . '%')
            ->where('type', 'LIKE', '%' . $type . '%')
            ->first();
    }
}
