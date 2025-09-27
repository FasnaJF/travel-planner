<?php

namespace App\Filament\Resources\AccommodationTypes;

use App\Filament\Resources\AccommodationTypes\Pages\CreateAccommodationType;
use App\Filament\Resources\AccommodationTypes\Pages\EditAccommodationType;
use App\Filament\Resources\AccommodationTypes\Pages\ListAccommodationTypes;
use App\Filament\Resources\AccommodationTypes\Pages\ViewAccommodationType;
use App\Filament\Resources\AccommodationTypes\RelationManagers\AccommodationTypeImageRelationManager;
use App\Filament\Resources\AccommodationTypes\Schemas\AccommodationTypeForm;
use App\Filament\Resources\AccommodationTypes\Schemas\AccommodationTypeInfolist;
use App\Filament\Resources\AccommodationTypes\Tables\AccommodationTypesTable;
use App\Models\AccommodationType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AccommodationTypeResource extends Resource
{
    protected static ?string $model = AccommodationType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AccommodationTypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AccommodationTypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AccommodationTypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            AccommodationTypeImageRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAccommodationTypes::route('/'),
            'create' => CreateAccommodationType::route('/create'),
            'view' => ViewAccommodationType::route('/{record}'),
            'edit' => EditAccommodationType::route('/{record}/edit'),
        ];
    }
}
