<?php

namespace TomatoPHP\FilamentTypes\Tests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use TomatoPHP\FilamentTypes\Services\Contracts\TypeFor;
use TomatoPHP\FilamentTypes\Services\Contracts\TypeOf;
use TomatoPHP\FilamentTypes\Tests\Models\Type;

class TypeFactory extends Factory
{
    protected $model = Type::class;

    public function definition(): array
    {
        return [
            'order' => $this->faker->numberBetween(0, 10),
            'for' => $this->faker->name(),
            'name' => $this->faker->name(),
            'key' => $this->faker->name(),
            'type' => $this->faker->name(),
            'description' => $this->faker->text(),
            'color' => $this->faker->hexColor(),
            'icon' => 'heroicon-o-user',
        ];
    }

    public function typeFor(TypeFor $typeFor): self
    {
        return $this->state(function (array $attributes) use ($typeFor) {
            return ['for' => $typeFor->for];
        });
    }

    public function typeOf(TypeOf $type): self
    {
        return $this->state(function (array $attributes) use ($type) {
            return ['type' => $type->type];
        });
    }
}
