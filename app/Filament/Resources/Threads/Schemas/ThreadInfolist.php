<?php

namespace App\Filament\Resources\Threads\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ThreadInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            ]);
    }
}
