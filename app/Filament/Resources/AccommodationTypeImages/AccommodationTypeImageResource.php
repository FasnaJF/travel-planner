<?php

namespace App\Filament\Resources\AccommodationTypeImages;

use App\Filament\Resources\AccommodationTypeImages\Pages\CreateAccommodationTypeImage;
use App\Filament\Resources\AccommodationTypeImages\Pages\EditAccommodationTypeImage;
use App\Filament\Resources\AccommodationTypeImages\Pages\ListAccommodationTypeImages;
use App\Filament\Resources\AccommodationTypeImages\Pages\ViewAccommodationTypeImage;
use App\Filament\Resources\AccommodationTypeImages\Schemas\AccommodationTypeImageForm;
use App\Filament\Resources\AccommodationTypeImages\Schemas\AccommodationTypeImageInfolist;
use App\Filament\Resources\AccommodationTypeImages\Tables\AccommodationTypeImagesTable;
use App\Models\AccommodationTypeImage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AccommodationTypeImageResource extends Resource
{
    protected static ?string $model = AccommodationTypeImage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AccommodationTypeImageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AccommodationTypeImageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AccommodationTypeImagesTable::configure($table);
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
            'index' => ListAccommodationTypeImages::route('/'),
            'create' => CreateAccommodationTypeImage::route('/create'),
            'view' => ViewAccommodationTypeImage::route('/{record}'),
            'edit' => EditAccommodationTypeImage::route('/{record}/edit'),
        ];
    }
}
