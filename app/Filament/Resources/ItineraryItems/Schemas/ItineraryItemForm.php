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
                \Filament\Forms\Components\Select::make('item_type')
                    ->options([
                        'service' => 'Service',
                        'accommodation' => 'Accommodation',
                    ])
                    ->label('Item Type')
                    ->required()
                    ->reactive(),
                \Filament\Forms\Components\Select::make('service_id')
                    ->relationship('service', 'name')
                    ->searchable()
                    ->visible(fn ($livewire, $get) => $get('item_type') === 'service')
                    ->live(),

                \Filament\Forms\Components\Select::make('accommodation_type_id')
                    ->relationship('accommodationType', 'name')
                    ->searchable()
                    ->visible(fn ($livewire, $get) => $get('item_type') === 'accommodation')
                    ->live(),

                \Filament\Forms\Components\Select::make('accommodation_option_id')
                    ->relationship('accommodationOption', 'name')
                    ->searchable()
                    ->visible(fn ($livewire, $get) => $get('item_type') === 'accommodation')
                    ->live(),
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
