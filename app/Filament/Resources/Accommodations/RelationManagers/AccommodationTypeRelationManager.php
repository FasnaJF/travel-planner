<?php

namespace App\Filament\Resources\Accommodations\RelationManagers;

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
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AccommodationTypeRelationManager extends RelationManager
{
    protected static string $relationship = 'accommodationTypes';


    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('max_occupancy')
                    ->label('Max Occupancy')
                    ->numeric()
                    ->minValue(1),
                Forms\Components\TextInput::make('price_per_night')
                    ->numeric()
                    ->prefix('$')
                    ->minValue(0),
                Forms\Components\Toggle::make('pets_allowed')
                    ->label('Pets Allowed'),
                Forms\Components\Textarea::make('amenities')
                    ->label('Amenities')
                    ->helperText('Comma-separated list of amenities'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('max_occupancy')
                    ->label('Max Occupancy')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price_per_night')
                    ->money('USD')
                    ->sortable(),
                Tables\Columns\IconColumn::make('pets_allowed')
                    ->label('Pets Allowed')
                    ->boolean(),
                Tables\Columns\TextColumn::make('amenities')
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('pets_allowed')
                    ->label('Pets Allowed')
                    ->boolean()
                    ->trueLabel('Pets Allowed')
                    ->falseLabel('No Pets')
                    ->native(false),
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
