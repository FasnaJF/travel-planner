<?php

namespace App\Filament\Resources\AccommodationTypes\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AccommodationTypeInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('accommodation.id')
                    ->numeric(),
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
            ]);
    }
}
