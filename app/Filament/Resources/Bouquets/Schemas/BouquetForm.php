<?php

namespace App\Filament\Resources\Bouquets\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BouquetForm
{
    /**
     * Configure the Form schema for Bouquet resource.
     * Includes fields for bouquet details and multiple image uploads.
     */
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Bouquet Information')
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('description')
                            ->required(),
                        TextInput::make('color')
                            ->required(),
                        TextInput::make('occasion')
                            ->default(null),
                    ])->columns(2),

                Section::make('Gallery')
                    ->description('Upload one or more images of this bouquet.')
                    ->schema([
                        FileUpload::make('images')
                            ->disk('event_images')
                            ->visibility('public')
                    ])
            ]);
    }
}
