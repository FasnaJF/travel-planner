<?php

namespace App\Filament\Resources\AccommodationTypeImages\Pages;

use App\Filament\Resources\AccommodationTypeImages\AccommodationTypeImageResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAccommodationTypeImage extends EditRecord
{
    protected static string $resource = AccommodationTypeImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
