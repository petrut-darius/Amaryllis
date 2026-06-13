<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Operation;

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
                            ->required()
                            ->hiddenOn(Operation::Edit),
                    ]),
                Section::make('Backend user information')
                    ->schema([
                        Radio::make('super_admin')
                            ->label('Super Admin?')
                            ->boolean(trueLabel: 'Da', falseLabel: 'Nu')
                            ->inline()
                            ->default(false),
                        CheckboxList::make('permissions')
                            ->label('User permissions')
                            ->relationship('permissions', 'slug')
                            ->columns(3)
                            ->searchable(),
                    ]),
            ]);
    }
}
