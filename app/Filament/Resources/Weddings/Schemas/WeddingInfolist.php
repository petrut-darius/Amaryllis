<?php

namespace App\Filament\Resources\Weddings\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class WeddingInfolist
{
    /**
     * Configure the Infolist schema for Wedding resource.
     * Displays wedding details and a beautiful grid of associated images.
     */
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Wedding Details')
                    ->schema([
                        TextEntry::make('name')
                            ->weight('bold'),
                        TextEntry::make('description')
                            ->columnSpanFull(),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->label('Date created'),
                    ])->columns(2),

                Section::make("Wedding")
                    ->description('Visual memories of the special day.')
                    ->schema([
                        ImageEntry::make("images")
                            ->disk("event_images"),
                    ])
            ]);
    }
}
