<?php

namespace App\Filament\Resources\ItineraryItems\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ItineraryItemInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('itinerary_id')
                    ->numeric(),
                TextEntry::make('item_type'),
                TextEntry::make('service_id')
                    ->numeric(),
                TextEntry::make('accommodation_type_id')
                    ->numeric(),
                TextEntry::make('accommodation_option_id')
                    ->numeric(),
                TextEntry::make('start_date')
                    ->dateTime(),
                TextEntry::make('end_date')
                    ->dateTime(),
                TextEntry::make('price')
                    ->money(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
