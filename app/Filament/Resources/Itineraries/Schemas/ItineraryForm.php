<?php

namespace App\Filament\Resources\Itineraries\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ItineraryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                DateTimePicker::make('start_date')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $start = $state;
                        $end = $get('end_date');
                        if ($start && $end) {
                            $duration = \Carbon\Carbon::parse($start)->diffInDays(\Carbon\Carbon::parse($end)) + 1;
                            $set('duration', $duration);
                        }
                    }),
                DateTimePicker::make('end_date')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $end = $state;
                        $start = $get('start_date');
                        if ($start && $end) {
                            $duration = \Carbon\Carbon::parse($start)->diffInDays(\Carbon\Carbon::parse($end)) + 1;
                            $set('duration', $duration);
                        }
                    }),
                TextInput::make('duration')
                    ->required()
                    ->numeric()
                    ->readonly()

            ]);
    }
}
