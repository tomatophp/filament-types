<span
    @if($label)
        x-tooltip="{
        content: '{{ $label }}',
        theme: $store.theme,
    }"
    @endif
    style="{{ implode([
        "background-color: rgba(".$r.", ".$g.", ".$b.", 0.2);",
        "color: rgba(".$r.", ".$g.", ".$b.", 1);"
    ]) }}" class="mx-3 fi-badge flex items-center justify-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 min-w-[theme(spacing.6)] py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30 fi-color-primary">

    @if($type->icon && $iconExists)
        <div>
            <x-icon :name="$type->icon" class="h-4 w-4" />
        </div>
    @endif

    <div id="type-{{ $type->key }}-{{ $type->for }}-{{ $type->type }}">
        {{ $type->name ?? config('filament-types.empty_state') }}
    </div>
</span>
