<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                IconEntry::make('super_admin')
                    ->boolean(),
                TextEntry::make('email')
                    ->label('Email address')
                    ->icon(Heroicon::Envelope),
                TextEntry::make('email_verified_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
