<?php

namespace App\Filament\Resources\AccommodationTypeImages\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AccommodationTypeImageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('accommodationType.name')
                    ->label('Accommodation Type'),
                ImageEntry::make('image_url')
                    ->label('Image')
                    ->disk('public')
                    ->square()
                    ->imageWidth(250)
                    ->imageHeight(250),
                TextEntry::make('alt_text')
                    ->label('Alt Text'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
