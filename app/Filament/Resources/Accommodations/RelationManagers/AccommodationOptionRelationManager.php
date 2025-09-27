<?php

namespace App\Filament\Resources\Accommodations\RelationManagers;

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
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AccommodationOptionRelationManager extends RelationManager
{
    protected static string $relationship = 'accommodationOptions';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\Select::make('accommodation_type_id')
                    ->label('Accommodation Type')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->options(function () {
                        // Get accommodation types for the current accommodation only
                        $accommodation = $this->getOwnerRecord();
                        return $accommodation->accommodationTypes()
                            ->pluck('name', 'id')
                            ->toArray();
                    })
                    ->helperText('Select an accommodation type from this accommodation'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('price_adjustment')
                    ->label('Price Adjustment')
                    ->numeric()
                    ->prefix('$')
                    ->helperText('Additional cost or discount for this option'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('accommodationType.name')
                    ->label('Accommodation Type')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('price_adjustment')
                    ->label('Price Adjustment')
                    ->money('USD')
                    ->sortable(),
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
                Tables\Filters\SelectFilter::make('accommodation_type_id')
                    ->label('Accommodation Type')
                    ->relationship('accommodationType', 'name')
                    ->searchable()
                    ->preload(),
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
