<?php

namespace App\Filament\Resources\Eighteenths\Pages;

use App\Filament\Resources\Eighteenths\EighteenthResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditEighteenth extends EditRecord
{

    protected static string $resource = EighteenthResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
