<?php

namespace App\Filament\Resources\AccommodationTypeImages\Pages;

use App\Filament\Resources\AccommodationTypeImages\AccommodationTypeImageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAccommodationTypeImages extends ListRecords
{
    protected static string $resource = AccommodationTypeImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
