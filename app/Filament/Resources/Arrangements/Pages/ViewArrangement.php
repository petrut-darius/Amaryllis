<?php

namespace App\Filament\Resources\Arrangements\Pages;

use App\Filament\Resources\Arrangements\ArrangementResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewArrangement extends ViewRecord
{
    protected static string $resource = ArrangementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
