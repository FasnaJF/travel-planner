<?php

namespace App\Filament\Resources\ServiceImages\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ServiceImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('service_id')
                    ->relationship('service', 'name')
                    ->required(),
                Textarea::make('image_url')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('alt_text'),
            ]);
    }
}
