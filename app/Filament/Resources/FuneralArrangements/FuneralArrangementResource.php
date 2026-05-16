<?php

namespace App\Filament\Resources\FuneralArrangements;

use App\Filament\Resources\FuneralArrangements\Pages\CreateFuneralArrangement;
use App\Filament\Resources\FuneralArrangements\Pages\EditFuneralArrangement;
use App\Filament\Resources\FuneralArrangements\Pages\ListFuneralArrangements;
use App\Filament\Resources\FuneralArrangements\Pages\ViewFuneralArrangement;
use App\Filament\Resources\FuneralArrangements\Schemas\FuneralArrangementForm;
use App\Filament\Resources\FuneralArrangements\Schemas\FuneralArrangementInfolist;
use App\Filament\Resources\FuneralArrangements\Tables\FuneralArrangementsTable;
use App\Models\FuneralArrangement;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FuneralArrangementResource extends Resource
{
    protected static ?string $model = FuneralArrangement::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return FuneralArrangementForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FuneralArrangementInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FuneralArrangementsTable::configure($table);
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
            'index' => ListFuneralArrangements::route('/'),
            'create' => CreateFuneralArrangement::route('/create'),
            'view' => ViewFuneralArrangement::route('/{record}'),
            'edit' => EditFuneralArrangement::route('/{record}/edit'),
        ];
    }
}
