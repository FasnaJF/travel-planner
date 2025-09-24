<?php

namespace App\Filament\Resources\ItineraryItems\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ItineraryItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('itinerary_id')
                    ->required()
                    ->numeric(),
                TextInput::make('item_type')
                    ->required(),
                TextInput::make('service_id')
                    ->numeric(),
                TextInput::make('accommodation_type_id')
                    ->numeric(),
                TextInput::make('accommodation_option_id')
                    ->numeric(),
                DateTimePicker::make('start_date')
                    ->required(),
                DateTimePicker::make('end_date')
                    ->required(),
                Textarea::make('details')
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->numeric()
                    ->prefix('$'),
            ]);
    }
}
