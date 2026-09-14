<?php

use TomatoPHP\FilamentTypes\Tests\Models\User;
use TomatoPHP\FilamentTypes\Tests\Pages\TypeViewComponentPage;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function () {
    actingAs(User::factory()->create());
});

it('can render type component page', function () {
    get(TypeViewComponentPage::getUrl())->assertSuccessful();
});

it('can render type component', function () {
    $response = get(TypeViewComponentPage::getUrl());
    $response->assertSee('<div id="type-todo-notes-groups">', false);
});
