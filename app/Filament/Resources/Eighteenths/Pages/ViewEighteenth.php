<?php

namespace App\Filament\Resources\Eighteenths\Pages;

use App\Filament\Resources\Eighteenths\EighteenthResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEighteenth extends ViewRecord
{
    protected static string $resource = EighteenthResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
