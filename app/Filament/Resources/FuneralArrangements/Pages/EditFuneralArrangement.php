<?php

namespace App\Filament\Resources\FuneralArrangements\Pages;

use App\Filament\Resources\FuneralArrangements\FuneralArrangementResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditFuneralArrangement extends EditRecord
{
    protected static string $resource = FuneralArrangementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
