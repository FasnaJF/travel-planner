<?php

namespace App\Filament\Resources\AccommodationTypeImages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AccommodationTypeImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('accommodation_type_id')
                    ->relationship('accommodationType', 'name')
                    ->required(),
                FileUpload::make('image_url')
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
                    ->maxSize(5120) // 5MB
                    ->columnSpanFull(),
                TextInput::make('alt_text')
                    ->label('Alt Text')
                    ->helperText('Alternative text for accessibility')
                    ->maxLength(255),
            ]);
    }
}
