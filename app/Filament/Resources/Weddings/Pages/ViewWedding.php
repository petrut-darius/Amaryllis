<?php

namespace App\Filament\Resources\Weddings\Pages;

use App\Filament\Resources\Weddings\WeddingResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewWedding extends ViewRecord
{
    protected static string $resource = WeddingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
