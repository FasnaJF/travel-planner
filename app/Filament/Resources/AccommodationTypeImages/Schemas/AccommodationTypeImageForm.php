<?php

namespace App\Filament\Resources\AccommodationTypeImages\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AccommodationTypeImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('accommodation_type_id')
                    ->relationship('accommodationType', 'name')
                    ->required(),
                Textarea::make('image_url')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('alt_text'),
            ]);
    }
}
