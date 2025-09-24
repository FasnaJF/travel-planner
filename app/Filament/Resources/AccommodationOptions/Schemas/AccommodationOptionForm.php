<?php

namespace App\Filament\Resources\AccommodationOptions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AccommodationOptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('accommodation_type_id')
                    ->relationship('accommodationType', 'name')
                    ->required(),
                TextInput::make('description')
                    ->required(),
                TextInput::make('price_adjustment')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
