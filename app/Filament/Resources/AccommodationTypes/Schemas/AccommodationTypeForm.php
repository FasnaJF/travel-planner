<?php

namespace App\Filament\Resources\AccommodationTypes\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AccommodationTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('accommodation_id')
                    ->relationship('accommodation', 'id')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('description')
                    ->required(),
                TextInput::make('price_per_night')
                    ->required()
                    ->numeric(),
                TextInput::make('max_occupancy')
                    ->required()
                    ->numeric(),
                Toggle::make('pets_allowed')
                    ->required(),
                Textarea::make('amenities')
                    ->columnSpanFull(),
            ]);
    }
}
