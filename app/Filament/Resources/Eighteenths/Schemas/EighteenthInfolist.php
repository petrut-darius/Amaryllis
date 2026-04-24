<?php

namespace App\Filament\Resources\Eighteenths\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class EighteenthInfolist
{
    /**
     * Configure the Infolist schema for Eighteenth resource.
     * Displays event details and a beautiful grid of associated images.
     */
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Eighteenth Details')
                    ->description('General information about the eighteenth event.')
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
                        ImageEntry::make("images")
                            ->disk("event_images"),
                    ])
            ]);
    }
}
