<?php

namespace App\Filament\Resources\Threads\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ThreadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Thread Information')
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
                    ->description('Upload one image of this thread.')
                    ->schema([
                        FileUpload::make('images')
                            ->maxsize((int) 20480)
                            ->disk('event_images')
                            ->visibility('public')
                            ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png', 'image/webp']),
                    ]),
            ]);
    }
}
