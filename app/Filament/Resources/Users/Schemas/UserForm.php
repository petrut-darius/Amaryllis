<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Personal user information')
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('email')
                            ->label('Email address')
                            ->email()
                            ->required(),
                        DateTimePicker::make('email_verified_at'),
                        TextInput::make('password')
                            ->password()
                            ->revealable()
                            ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                            ->dehydrated(fn (?string $state) => filled($state))
                            ->required(fn ($record) => $record === null),
                    ]),
                Section::make('Backend user information')
                    ->schema([
                        Toggle::make("super_admin")
                            ->label("Super Admin?")
                            ->inline(false),
                        CheckboxList::make('permissions')
                            ->label('User permissions')
                            ->relationship('permissions', 'slug')
                            ->columns(3)
                            ->searchable(),
                    ]),
            ]);
    }
}
