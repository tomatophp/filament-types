<?php

namespace TomatoPHP\FilamentTypes\Components;

use Illuminate\View\Component;

class Type extends Component
{
    public ?string $r = null;

    public ?string $g = null;

    public ?string $b = null;

    public bool $iconExists = false;

    public function __construct(
        public \TomatoPHP\FilamentTypes\Models\Type $type,
        public ?string $label = null,
    ) {
        [$this->r, $this->g, $this->b] = sscanf($this->type->color, '#%02x%02x%02x');

        if ($this->type->icon) {
            try {
                app(\BladeUI\Icons\Factory::class)->svg($this->type->icon);
                $this->iconExists = true;
            } catch (\Exception $e) {
            }
        }
    }

    public function render()
    {
        return view('filament-types::components.type');
    }
}
