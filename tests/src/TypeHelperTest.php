<?php

use TomatoPHP\FilamentTypes\Tests\Models\Type;

use function PHPUnit\Framework\assertTrue;

it('can use helper function', function () {
    $generateType = Type::factory()->create();

    $type = type_of($generateType->key, $generateType->for, $generateType->type);

    assertTrue($type->key == $generateType->key);
});
