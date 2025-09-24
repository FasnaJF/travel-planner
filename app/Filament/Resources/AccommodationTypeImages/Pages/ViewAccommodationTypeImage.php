<?php

namespace App\Filament\Resources\AccommodationTypeImages\Pages;

use App\Filament\Resources\AccommodationTypeImages\AccommodationTypeImageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAccommodationTypeImage extends ViewRecord
{
    protected static string $resource = AccommodationTypeImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
