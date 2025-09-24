<?php

namespace App\Filament\Resources\ServiceImages\Pages;

use App\Filament\Resources\ServiceImages\ServiceImageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewServiceImage extends ViewRecord
{
    protected static string $resource = ServiceImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
