<?php

namespace App\Filament\Resources\FuneralArrangements\Pages;

use App\Filament\Resources\FuneralArrangements\FuneralArrangementResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFuneralArrangement extends ViewRecord
{
    protected static string $resource = FuneralArrangementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
