<?php

namespace App\Filament\Resources\Arrangements\Pages;

use App\Filament\Resources\Arrangements\ArrangementResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditArrangement extends EditRecord
{
    protected static string $resource = ArrangementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
