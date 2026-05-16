<?php

namespace App\Filament\Resources\FuneralArrangements\Pages;

use App\Filament\Resources\FuneralArrangements\FuneralArrangementResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFuneralArrangements extends ListRecords
{
    protected static string $resource = FuneralArrangementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
