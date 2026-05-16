<?php

namespace App\Filament\Resources\Arrangements;

use App\Filament\Resources\Arrangements\Pages\CreateArrangement;
use App\Filament\Resources\Arrangements\Pages\EditArrangement;
use App\Filament\Resources\Arrangements\Pages\ListArrangements;
use App\Filament\Resources\Arrangements\Pages\ViewArrangement;
use App\Filament\Resources\Arrangements\Schemas\ArrangementForm;
use App\Filament\Resources\Arrangements\Schemas\ArrangementInfolist;
use App\Filament\Resources\Arrangements\Tables\ArrangementsTable;
use App\Models\Arrangement;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ArrangementResource extends Resource
{
    protected static ?string $model = Arrangement::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ArrangementForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ArrangementInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ArrangementsTable::configure($table);
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
            'index' => ListArrangements::route('/'),
            'create' => CreateArrangement::route('/create'),
            'view' => ViewArrangement::route('/{record}'),
            'edit' => EditArrangement::route('/{record}/edit'),
        ];
    }
}
