<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\ViewEntry;

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

                ViewEntry::make('serviceImages')
                    ->label('Service Images')
                    ->view('infolists.components.service-images-grid')
                    ->columns(2)
                    ->columnSpanFull()


            ]);
    }
}
