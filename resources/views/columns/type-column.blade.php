@php
    $type = \TomatoPHP\FilamentTypes\Models\Type::where('key', $getState())->first();
    if($type){
        $value = $type->name;
        $hex = $type->color;
        $icon = $type->icon;
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        $colorRGB= array($r, $g, $b);
    }
    else {
        $value = $getState();
        $colorRGB = [0,0,0];
        $icon = null;
    }
@endphp
<span style="{{ implode([
        "background-color: rgba(".$colorRGB[0].", ".$colorRGB[1].", ".$colorRGB[2].", 0.2);",
        "color: rgba(".$colorRGB[0].", ".$colorRGB[1].", ".$colorRGB[2].", 1);"
    ]) }}" class="fi-badge flex items-center justify-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 min-w-[theme(spacing.6)] py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30 fi-color-primary">

    @if($icon)
        <div>
            <x-filament-icon :icon="$icon" size="h-4 w-4" />
        </div>
    @endif

    <div>
        {{ $value }}
    </div>
</span>
