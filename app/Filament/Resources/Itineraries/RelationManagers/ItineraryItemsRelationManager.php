<?php

namespace App\Filament\Resources\Itineraries\RelationManagers;

use App\Filament\Resources\Itineraries\ItineraryResource;
use App\Filament\Resources\ItineraryItems\ItineraryItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class ItineraryItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'itineraryItems';

    protected static ?string $relatedResource = ItineraryItemResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
