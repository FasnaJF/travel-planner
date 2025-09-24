<?php

namespace App\Filament\Resources\ServiceImages;

use App\Filament\Resources\ServiceImages\Pages\CreateServiceImage;
use App\Filament\Resources\ServiceImages\Pages\EditServiceImage;
use App\Filament\Resources\ServiceImages\Pages\ListServiceImages;
use App\Filament\Resources\ServiceImages\Pages\ViewServiceImage;
use App\Filament\Resources\ServiceImages\Schemas\ServiceImageForm;
use App\Filament\Resources\ServiceImages\Schemas\ServiceImageInfolist;
use App\Filament\Resources\ServiceImages\Tables\ServiceImagesTable;
use App\Models\ServiceImage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ServiceImageResource extends Resource
{
    protected static ?string $model = ServiceImage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ServiceImageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ServiceImageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceImagesTable::configure($table);
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
            'index' => ListServiceImages::route('/'),
            'create' => CreateServiceImage::route('/create'),
            'view' => ViewServiceImage::route('/{record}'),
            'edit' => EditServiceImage::route('/{record}/edit'),
        ];
    }
}
