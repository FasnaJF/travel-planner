<?php

namespace App\Filament\Resources\ServiceImages\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ServiceImageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('service.name')
                    ->numeric(),
                ImageEntry::make('image_url')
                    ->label('Image')
                    ->disk('public')
                    ->square()
                    ->imageWidth(250)
                    ->imageHeight(250),
                TextEntry::make('alt_text'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
