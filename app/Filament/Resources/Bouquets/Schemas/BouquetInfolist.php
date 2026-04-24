<?php

namespace App\Filament\Resources\Bouquets\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BouquetInfolist
{
    /**
     * Configure the Infolist schema for Bouquet resource.
     * Displays bouquet details and a beautiful grid of associated images.
     */
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

            ]);
    }
}
