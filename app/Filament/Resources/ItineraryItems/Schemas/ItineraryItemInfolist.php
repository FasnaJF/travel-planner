<?php

namespace App\Filament\Resources\ItineraryItems\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ItineraryItemInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Itinerary Item Details')->schema([
                    TextEntry::make('itinerary.name'),
                    TextEntry::make('item_type')
                        ->label('Item Type')
                        ->formatStateUsing(fn($state) => ucfirst($state)),
                    TextEntry::make('service.name')
                        ->label('Service Name')
                        ->visible(fn($record) => $record->item_type === 'service'),
                    TextEntry::make('accommodationType.name')
                        ->visible(fn($record) => $record->item_type !== 'service'),
                    TextEntry::make('accommodationOption.name')
                        ->visible(fn($record) => $record->item_type !== 'service'),
                    TextEntry::make('start_date')
                        ->dateTime(),
                    TextEntry::make('end_date')
                        ->dateTime(),
                    TextEntry::make('price')
                        ->money(),
                    TextEntry::make('created_at')
                        ->dateTime(),
                    TextEntry::make('updated_at')
                        ->dateTime(),
                ])->columns(2)
                    ->columnSpanFull(),

                Section::make('Service Details')
                    ->visible(fn($record) => $record->item_type === 'service')
                    ->schema([
                        TextEntry::make('service.description')->label('Description')->visible(fn($record) => $record->item_type === 'service'),
                        TextEntry::make('service.price')->money()->label('Price')->visible(fn($record) => $record->item_type === 'service'),
                        TextEntry::make('service.duration_minutes')->numeric()->label('Duration (minutes)')->visible(fn($record) => $record->item_type === 'service'),

                    ])->columns(2)
                    ->columnSpanFull(),
                Section::make('Service Images')
                    ->visible(fn($record) => $record->item_type === 'service')
                    ->schema([
                        \Filament\Infolists\Components\RepeatableEntry::make('service.serviceImages')
                            ->label('Images')
                            ->visible(fn($record) => $record->item_type === 'service')
                            ->schema([
                                ImageEntry::make('image_url')
                                    ->square()
                                    ->label('Image'),
                            ]),
                    ])->columns(2) // number of columns in a row
                    ,
                Section::make('Accommodation Details')
                    ->visible(fn($record) => $record->item_type !== 'service')
                    ->schema([
                        TextEntry::make('accommodationType.accommodation.address')->label('Address')->visible(fn($record) => $record->item_type !== 'service'),
                        TextEntry::make('accommodationType.accommodation.rating')->label('Rating')->visible(fn($record) => $record->item_type !== 'service'),
                        TextEntry::make('accommodationType.name')->label('Accommodation Type')->visible(fn($record) => $record->item_type !== 'service'),
                        TextEntry::make('accommodationType.description')->label('Description')->visible(fn($record) => $record->item_type !== 'service'),
                        TextEntry::make('accommodationType.price_per_night')->money()->label('Price per Night')->visible(fn($record) => $record->item_type !== 'service'),
                        TextEntry::make('accommodationOption.name')->money()->label('Accommodation Option')->visible(fn($record) => $record->item_type !== 'service'),
                        TextEntry::make('accommodationOption.capacity')->numeric()->label('Capacity')->visible(fn($record) => $record->item_type !== 'service'),

                    ])->columns(2)
                    ->columnSpanFull(),
                Section::make('Accommodation Images')
                    ->visible(fn($record) => $record->item_type !== 'service')
                    ->schema([
                        \Filament\Infolists\Components\RepeatableEntry::make('accommodationType.accommodationTypeImages')
                            ->label('Images')
                            ->visible(fn($record) => $record->item_type !== 'service')
                            ->schema([
                                ImageEntry::make('image_url')
                                    ->disk('public')
                                    ->square()
                                    ->label('Image'),
                            ]),
                    ])->columns(1) // number of columns in a row
                    ->columnSpanFull(),
            ]);
    }
}
