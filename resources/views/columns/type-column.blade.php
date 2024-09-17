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

    $iconExists = false;
    if($icon){
        try {
            app(\BladeUI\Icons\Factory::class)->svg($icon);
             $iconExists = true;
        }catch (\Exception $e){}
    }
@endphp
@if($value || config('filament-types.empty_state'))

<span @if($description && $getAllowDescription()) x-tooltip="{content: '{{$description}}', theme: $store.theme }" @endif style="{{ implode([
        "background-color: rgba(".$colorRGB[0].", ".$colorRGB[1].", ".$colorRGB[2].", 0.2);",
        "color: rgba(".$colorRGB[0].", ".$colorRGB[1].", ".$colorRGB[2].", 1);"
    ]) }}" class="mx-3 fi-badge flex items-center justify-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 min-w-[theme(spacing.6)] py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30 fi-color-primary">

    @if($icon && $iconExists)
        <div>
            <x-icon :name="$icon" class="h-4 w-4" />
        </div>
    @endif

    <div>
        {{ $value ?? config('filament-types.empty_state') }}
    </div>
</span>
@endif
