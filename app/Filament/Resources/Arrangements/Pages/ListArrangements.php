<?php

namespace App\Filament\Resources\Arrangements\Pages;

use App\Filament\Resources\Arrangements\ArrangementResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListArrangements extends ListRecords
{
    protected static string $resource = ArrangementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
