<?php

namespace App\Filament\Resources\Accommodations\RelationManagers;

use App\Filament\Resources\AccommodationTypeImages\Schemas\AccommodationTypeImageForm;
use App\Filament\Resources\AccommodationTypeImages\Schemas\AccommodationTypeImageInfolist;
use App\Filament\Resources\AccommodationTypeImages\Tables\AccommodationTypeImagesTable;
use App\Models\AccommodationTypeImage;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AccommodationTypeImageRelationManager extends RelationManager
{
    protected static string $relationship = 'accommodationTypeImages';

    public function form(Schema $schema): Schema
    {
        return AccommodationTypeImageForm::configure($schema);
    }

    public function infolist(Schema $schema): Schema
    {
        return AccommodationTypeImageInfolist::configure($schema);
    }

    public function table(Table $table): Table
    {
        return AccommodationTypeImagesTable::configure($table);
    }
}
