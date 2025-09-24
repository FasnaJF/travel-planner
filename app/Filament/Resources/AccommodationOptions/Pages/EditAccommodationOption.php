<?php

namespace App\Filament\Resources\AccommodationOptions\Pages;

use App\Filament\Resources\AccommodationOptions\AccommodationOptionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAccommodationOption extends EditRecord
{
    protected static string $resource = AccommodationOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
