<?php

namespace App\Filament\Resources\Accommodations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AccommodationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('account_id')
                    ->relationship('account', 'name')
                    ->required(),
                TextInput::make('rating')
                    ->numeric(),
                TextInput::make('address'),
            ]);
    }
}
