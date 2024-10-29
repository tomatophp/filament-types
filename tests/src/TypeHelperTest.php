<?php

use function PHPUnit\Framework\assertTrue;

it('can use helper function', function () {
    if (function_exists('type_of')) {
        assertTrue(true);
    }

    $type = type_of('xl', 'products', 'sizes');

    assertTrue($type->key === 'xl');
});
