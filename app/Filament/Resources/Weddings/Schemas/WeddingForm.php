<?php

namespace App\Filament\Resources\Weddings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class WeddingForm
{
    /**
     * Configure the Form schema for Wedding resource.
     * Includes fields for wedding details and multiple image uploads.
     */
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make("images")
                    ->disk("event_images")
                    ->visibility("public")
                    ->multiple()
            ]);
    }
}
