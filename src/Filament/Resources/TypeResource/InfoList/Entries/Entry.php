<?php

namespace TomatoPHP\FilamentTypes\Filament\Resources\TypeResource\InfoList\Entries;

abstract class Entry
{
    abstract public static function make(): \Filament\Infolists\Components\Entry;
}
