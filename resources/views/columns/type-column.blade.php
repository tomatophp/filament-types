@php

    if($getType() && $getFor()){
        $type = \TomatoPHP\FilamentTypes\Models\Type::where('key', $getState())
            ->where('for', $getFor())
            ->where('type', $getType())
            ->first();
    }
    else {
      $type = \TomatoPHP\FilamentTypes\Models\Type::where('key', $getState())->first();
    }

    $description = null;

    if($type){
        $value = $type->name;
        $hex = $type->color;
        $icon = $type->icon;
        $description = $type->description;
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        $colorRGB= array($r, $g, $b);
    }
    else {
        $value = $getState();
        $colorRGB = [0,0,0];
        $icon = null;
    }

    $iconExists = $icon ? \TomatoPHP\FilamentIcons\Facades\FilamentIcons::getIcon($icon) : null;
@endphp
@if($value || config('filament-types.empty_state'))

<span @if($description && $getAllowDescription()) x-tooltip="{content: '{{$description}}', theme: $store.theme }" @endif style="{{ implode([
        "background-color: rgba(".$colorRGB[0].", ".$colorRGB[1].", ".$colorRGB[2].", 0.2);",
        "color: rgba(".$colorRGB[0].", ".$colorRGB[1].", ".$colorRGB[2].", 1); display: flex; align-items: center; gap: 8px; padding: 4px 8px; border-radius: 8px; font-size: 12px; font-weight: 500;"
    ]) }}">

    @if($icon && $iconExists)
        <div style="display: flex; align-items: center; justify-content: center; width: 20px; height: 20px;">
            <x-filament-icon :icon="$icon" style="height: 20px; width: 20px;"/>
        </div>
    @endif

    <div>
        {{ $value ?? config('filament-types.empty_state') }}
    </div>
</span>
@endif
