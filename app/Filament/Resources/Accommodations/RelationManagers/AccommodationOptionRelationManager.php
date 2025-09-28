<?php

namespace App\Filament\Resources\Accommodations\RelationManagers;

use App\Filament\Resources\AccommodationOptions\Schemas\AccommodationOptionForm;
use App\Filament\Resources\AccommodationOptions\Schemas\AccommodationOptionInfolist;
use App\Filament\Resources\AccommodationOptions\Tables\AccommodationOptionsTable;
use App\Models\AccommodationOption;
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

class AccommodationOptionRelationManager extends RelationManager
{
    protected static string $relationship = 'accommodationOptions';

    public function form(Schema $schema): Schema
    {
        return AccommodationOptionForm::configure($schema);
    }

    public function infolist(Schema $schema): Schema
    {
        return AccommodationOptionInfolist::configure($schema);
    }

    public function table(Table $table): Table
    {
        return AccommodationOptionsTable::configure($table);
    }
}
