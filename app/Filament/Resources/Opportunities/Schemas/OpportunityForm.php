<?php

namespace App\Filament\Resources\Opportunities\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OpportunityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('client_id')
                    ->required()
                    ->numeric(),
                TextInput::make('status')
                    ->required()
                    ->default('Open'),
                TextInput::make('total_amount')
                    ->numeric(),
                DateTimePicker::make('start_date'),
                DateTimePicker::make('end_date'),
                TextInput::make('duration')
                    ->numeric(),
                TextInput::make('created_by')
                    ->required()
                    ->numeric(),
                TextInput::make('updated_by')
                    ->required()
                    ->numeric(),
            ]);
    }
}
