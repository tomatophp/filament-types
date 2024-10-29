<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Actions\Components;

abstract class Action
{
    abstract public static function make(): \Filament\Actions\Action;
}
