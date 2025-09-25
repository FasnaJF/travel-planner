<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ServiceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')->label('Service Name'),
                TextEntry::make('provider.account.name')->label('Provider Name'),
                TextEntry::make('price')
                    ->money(),
                TextEntry::make('duration_minutes')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
                RepeatableEntry::make('serviceImages')
                    ->schema([
                        TextEntry::make('service.name')
                            ->numeric(),
                        ImageEntry::make('image_url')
                            ->label('Image')
                            ->square()
                            ->imageWidth(250)
                            ->imageHeight(250),
                        // TextEntry::make('alt_text'),
                    ])
                    ->columns(2) // number of columns in a row
                    ->columnSpanFull()
            ]);
    }
}
