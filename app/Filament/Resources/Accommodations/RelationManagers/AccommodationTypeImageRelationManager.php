<?php

namespace App\Filament\Resources\Accommodations\RelationManagers;

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
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AccommodationTypeImageRelationManager extends RelationManager
{
    protected static string $relationship = 'accommodationTypeImages';

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
                Forms\Components\FileUpload::make('image_url')
                    ->label('Image')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->directory('uploads/images/accommodation-types')
                    ->visibility('public')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->maxSize(5120), // 5MB
                Forms\Components\TextInput::make('alt_text')
                    ->label('Alt Text')
                    ->helperText('Alternative text for accessibility')
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('alt_text')
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Image')
                    ->disk('public')
                    ->square(),
                Tables\Columns\TextColumn::make('accommodationType.name')
                    ->label('Accommodation Type')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alt_text')
                    ->label('Alt Text')
                    ->searchable()
                    ->limit(50),
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