<?php

namespace App\Filament\Resources\Bouquets\Pages;

use App\Filament\Resources\Bouquets\BouquetResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBouquet extends ViewRecord
{
    protected static string $resource = BouquetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
