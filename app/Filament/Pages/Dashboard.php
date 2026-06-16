<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\SendEmailWidget;
use Filament\Actions\Action;
use Filament\Pages\Dashboard as BaseDashboard;
use Override;

class Dashboard extends BaseDashboard
{

    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            /*
            Action::make('test')
                ->label('Test')
                ->url(route('delivery'))
                ->icon('heroicon-o-plus'),
                */
        ];
    }

    #[Override]
    public function getWidgets(): array
    {
        return [
            SendEmailWidget::class,
        ];
    }

    #[Override]
    public function getFooterWidgetsColumns(): int|array
    {
        return 1;
    }
}
