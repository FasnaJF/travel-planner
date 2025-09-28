<?php

namespace App\Filament\Resources\AccommodationTypes\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AccommodationTypeInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('accommodation.account.name'),
                TextEntry::make('name'),
                TextEntry::make('description'),
                TextEntry::make('price_per_night')
                    ->numeric(),
                TextEntry::make('max_occupancy')
                    ->numeric(),
                IconEntry::make('pets_allowed')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),

                ViewEntry::make('accommodationTypeImages')
                    ->label('Accommodation Images')
                    ->view('infolists.components.accommodation-images-grid')
                    ->columns(2)
                    ->columnSpanFull()

            ]);
    }
}
