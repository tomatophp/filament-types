<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\Table\HeaderActions;

abstract class Action
{
    abstract public static function make(): \Filament\Tables\Actions\Action;
}
