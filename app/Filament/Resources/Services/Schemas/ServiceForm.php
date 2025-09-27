<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('provider_id')
                    ->relationship('provider', 'id')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->prefix('$'),
                TextInput::make('duration_minutes')
                    ->required()
                    ->numeric()
                    ->default(0),
                // Add repeater for images
                Repeater::make('serviceImages')
                    ->relationship() // automatically binds to hasMany
                    ->schema([
                        FileUpload::make('image_url')
                            ->label('Image')
                            ->image()
                            ->disk('public')
                            ->directory('services')
                            ->required()
                            ->preserveFilenames() // optional
                            ->maxSize(2048) // optional
                    ])
                    ->minItems(1)
                    ->label('Service Images')
                    ->columns(1),

            ]);
    }
}
