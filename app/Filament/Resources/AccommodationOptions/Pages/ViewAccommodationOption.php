<?php

namespace App\Filament\Resources\AccommodationOptions\Pages;

use App\Filament\Resources\AccommodationOptions\AccommodationOptionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAccommodationOption extends ViewRecord
{
    protected static string $resource = AccommodationOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
