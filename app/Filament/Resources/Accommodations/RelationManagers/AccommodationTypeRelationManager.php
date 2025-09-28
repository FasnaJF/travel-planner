<?php

namespace App\Filament\Resources\Accommodations\RelationManagers;

use App\Filament\Resources\AccommodationTypes\Schemas\AccommodationTypeForm;
use App\Filament\Resources\AccommodationTypes\Schemas\AccommodationTypeInfolist;
use App\Filament\Resources\AccommodationTypes\Tables\AccommodationTypesTable;
use App\Models\AccommodationType;
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

class AccommodationTypeRelationManager extends RelationManager
{
    protected static string $relationship = 'accommodationTypes';


    public function form(Schema $schema): Schema
    {
        return AccommodationTypeForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return AccommodationTypesTable::configure($table);
    }

    public function infolist(Schema $schema): Schema
    {
        return AccommodationTypeInfolist::configure($schema);
    }
}
