<?php

namespace App\Filament\Resources\ServiceImages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ServiceImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('service_id')
                    ->relationship('service', 'name')
                    ->required(),
                FileUpload::make('image_url')
                    ->label('Image')
                    ->image()
                    ->directory('uploads/images/services') // where to store
                    ->visibility('public') // for public access
                    ->maxSize(2048) // 2MB
                    ->imagePreviewHeight('200')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('alt_text'),
            ]);
    }
}
