<?php

namespace App\Filament\Resources\Eighteenths;

use App\Filament\Resources\Eighteenths\Pages\CreateEighteenth;
use App\Filament\Resources\Eighteenths\Pages\EditEighteenth;
use App\Filament\Resources\Eighteenths\Pages\ListEighteenths;
use App\Filament\Resources\Eighteenths\Pages\ViewEighteenth;
use App\Filament\Resources\Eighteenths\Schemas\EighteenthForm;
use App\Filament\Resources\Eighteenths\Schemas\EighteenthInfolist;
use App\Filament\Resources\Eighteenths\Tables\EighteenthsTable;
use App\Models\Eighteenth;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EighteenthResource extends Resource
{
    protected static ?string $model = Eighteenth::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return EighteenthForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EighteenthInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EighteenthsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEighteenths::route('/'),
            'create' => CreateEighteenth::route('/create'),
            'view' => ViewEighteenth::route('/{record}'),
            'edit' => EditEighteenth::route('/{record}/edit'),
        ];
    }
}
