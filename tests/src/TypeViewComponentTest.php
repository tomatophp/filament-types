<?php

use TomatoPHP\FilamentTypes\Tests\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function () {
    actingAs(User::factory()->create());
});

it('can render type component page', function () {
get(\TomatoPHP\FilamentTypes\Tests\Pages\TypeViewComponentPage::getUrl())->assertSuccessful();
    });

it('can render type component', function () {
    $response = get(\TomatoPHP\FilamentTypes\Tests\Pages\TypeViewComponentPage::getUrl());
    $response->assertSee('<div id="type-todo-notes-groups">', false);
});
