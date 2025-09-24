<?php

namespace App\Filament\Resources\ServiceImages\Pages;

use App\Filament\Resources\ServiceImages\ServiceImageResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditServiceImage extends EditRecord
{
    protected static string $resource = ServiceImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
