<?php

namespace App\Filament\Resources\Baptisms\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BaptismInfolist
{
    /**
     * Configure the Infolist schema for Baptism resource.
     * Displays baptism details and a beautiful grid of associated images.
     */
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Baptism Details')
                    ->description('General information about the baptism event.')
                    ->schema([
                        TextEntry::make('name')
                            ->weight('bold'),
                        TextEntry::make('description')
                            ->columnSpanFull(),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->label('Date Created'),
                    ])->columns(2),

                Section::make('Event Gallery')
                    ->description('Photos of the event.')
                    ->schema([
                        ImageEntry::make('images')
                            ->disk('event_images'),
                    ]),

            ]);
    }
}
