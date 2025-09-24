<?php

namespace App\Filament\Resources\AccommodationOptions\Pages;

use App\Filament\Resources\AccommodationOptions\AccommodationOptionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAccommodationOptions extends ListRecords
{
    protected static string $resource = AccommodationOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
