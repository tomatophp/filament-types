@php use TomatoPHP\FilamentTypes\Models\Type; @endphp
<x-filament-panels::page>
    @php
        $type = Type::query()->create([
            'order' => 1,
            'for' => 'notes',
            'name' => 'TODO',
            'key' => 'todo',
            'type' => 'groups',
            'description' => 'TODO',
            'color' => '#1461e3',
            'icon' => 'heroicon-o-list-bullet',
        ])
    @endphp

    <x-tomato-type :type="$type" label="Group"/>
</x-filament-panels::page>
