<?php

namespace App\Filament\Resources\AccommodationOptions;

use App\Filament\Resources\AccommodationOptions\Pages\CreateAccommodationOption;
use App\Filament\Resources\AccommodationOptions\Pages\EditAccommodationOption;
use App\Filament\Resources\AccommodationOptions\Pages\ListAccommodationOptions;
use App\Filament\Resources\AccommodationOptions\Pages\ViewAccommodationOption;
use App\Filament\Resources\AccommodationOptions\Schemas\AccommodationOptionForm;
use App\Filament\Resources\AccommodationOptions\Schemas\AccommodationOptionInfolist;
use App\Filament\Resources\AccommodationOptions\Tables\AccommodationOptionsTable;
use App\Models\AccommodationOption;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AccommodationOptionResource extends Resource
{
    protected static ?string $model = AccommodationOption::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AccommodationOptionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AccommodationOptionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AccommodationOptionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAccommodationOptions::route('/'),
            'create' => CreateAccommodationOption::route('/create'),
            'view' => ViewAccommodationOption::route('/{record}'),
            'edit' => EditAccommodationOption::route('/{record}/edit'),
        ];
    }
}
