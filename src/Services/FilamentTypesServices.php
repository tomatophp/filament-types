<?php

namespace TomatoPHP\FilamentTypes\Services;

use Illuminate\Support\Collection;
use TomatoPHP\FilamentTypes\Models\Type;
use TomatoPHP\FilamentTypes\Services\Contracts\TypeFor;

class FilamentTypesServices
{
    protected array $types = [];

    public function register(TypeFor | array $types): void
    {
        if (is_array($types)) {
            foreach ($types as $type) {
                $this->register($type);
            }
        } else {
            $this->types[] = $types;
        }
    }

    public function get(): Collection
    {
        return collect($this->types)
            ->merge(filament('filament-types')->getTypes())
            ->groupBy(fn ($typeFor) => $typeFor->for) // Group by `for` attribute
            ->map(function ($group) {
                return $group
                    ->groupBy(fn ($typeFor) => $typeFor->for) // Group by `label` within each `for` group
                    ->map(function ($labelGroup) {
                        $mergedTypes = $labelGroup->flatMap(fn ($typeFor) => $typeFor->types)
                            ->map(function ($getType) use ($labelGroup) {
                                $getType->label = ! $getType->label ? str($getType->type)->title()->toString() : $getType->label;

                                if (is_array($getType->types) && count($getType->types)) {
                                    foreach ($getType->types as $typeItem) {
                                        $checkExists = Type::query()
                                            ->where('key', $typeItem->key)
                                            ->where('type', $getType->type)
                                            ->where('for', $labelGroup->first()->for)
                                            ->first();

                                        if (! $checkExists) {
                                            Type::query()->create([
                                                'key' => $typeItem->key,
                                                'type' => $getType->type,
                                                'icon' => $typeItem->icon,
                                                'color' => $typeItem->color,
                                                'for' => $labelGroup->first()->for,
                                                'name' => $typeItem->name,
                                            ]);
                                        }
                                    }
                                }

                                return $getType;
                            })
                            ->unique('type') // Ensure unique by `type`
                            ->values(); // Reindex after unique filter

                        $firstItem = $labelGroup->first();
                        $firstItem->types = $mergedTypes->toArray();

                        return $firstItem;
                    })
                    ->values();
            })
            ->flatten();
    }
}
