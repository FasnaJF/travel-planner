<?php

namespace App\Filament\Resources\Opportunities\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class OpportunityInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('client_full_name')
                    ->label('Client Name')
                    ->getStateUsing(fn ($record) => $record->client->first_name . ' ' . $record->client->last_name),
                TextEntry::make('status'),
                TextEntry::make('total_amount')
                    ->numeric(),
                TextEntry::make('start_date')
                    ->dateTime(),
                TextEntry::make('end_date')
                    ->dateTime(),
                TextEntry::make('duration')
                    ->numeric(),
                TextEntry::make('creator.name'),
                TextEntry::make('updator.name'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
