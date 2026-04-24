<?php

namespace App\Filament\Resources\Eighteenths\Pages;

use App\Filament\Resources\Eighteenths\EighteenthResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEighteenths extends ListRecords
{
    protected static string $resource = EighteenthResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
