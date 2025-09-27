<?php

namespace App\Filament\Resources\Itineraries\Schemas;

use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class ItineraryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Grid::make(2) // Two-column layout for main fields
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('start_date')->dateTime(),
                        TextEntry::make('end_date')->dateTime(),
                        TextEntry::make('duration')->numeric(),
                        TextEntry::make('created_at')->dateTime(),
                        TextEntry::make('updated_at')->dateTime(),
                    ]),

            ]);
    }
}
