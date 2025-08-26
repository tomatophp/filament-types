<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\Actions;

abstract class Action
{
    abstract public static function make(): \Filament\Actions\Action;
}
