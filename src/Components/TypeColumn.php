<?php

namespace TomatoPHP\FilamentTypes\Components;

use Filament\Support\Concerns\HasLineClamp;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\Concerns;

class TypeColumn extends TextColumn
{

    protected string $view = 'filament-types::columns.type-column';

}
