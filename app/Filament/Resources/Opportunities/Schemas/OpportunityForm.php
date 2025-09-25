<?php

namespace App\Filament\Resources\Opportunities\Schemas;

use App\Models\Contact;
use Carbon\Carbon;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\DB;

class OpportunityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('client_id')
                    ->label('Client')
                    ->searchable()
                    ->getSearchResultsUsing(function (string $search): array {
                        $clients = Contact::query()
                            ->where('first_name', 'like', "%{$search}%")
                            ->orWhere('last_name', 'like', "%{$search}%")
                            ->limit(50)
                            ->get();
                        return $clients->pluck(
                            fn ($client) => $client->first_name . ' ' . $client->last_name,
                            'id'
                        )->all();
                    })
                    ->getOptionLabelUsing(fn ($value): ?string => Contact::find($value)?->first_name . ' ' . Contact::find($value)?->last_name),
                TextInput::make('status')
                    ->required()
                    ->default('Open'),
                TextInput::make('total_amount')
                    ->numeric(),
               DateTimePicker::make('start_date')
    ->reactive()
    ->afterStateUpdated(function ($state, callable $set, callable $get) {
        $start = Carbon::parse($state);
        $end = Carbon::parse($get('end_date'));
        if ($start && $end && $start->lte($end)) { // Added a check to ensure start date is less than or equal to end date
            $set('duration', (int) $start->diffInDays($end));
        }
    }),

DateTimePicker::make('end_date')
    ->reactive()
    ->afterStateUpdated(function ($state, callable $set, callable $get) {
        $start = Carbon::parse($get('start_date'));
        $end = Carbon::parse($state);
        if ($start && $end && $start->lte($end)) { // Added a check
            $set('duration', (int) $start->diffInDays($end));
        }
    }),

TextInput::make('duration')
    ->numeric()
    ->readOnly()
    ->default(state: 0), // Set a default value to avoid initial display issues
                Select::make('created_by')
                    ->label('Created By')
                    ->searchable()
                    ->getSearchResultsUsing(function (string $search): array {
                        return \App\Models\User::query()
                            ->where('name', 'like', "%{$search}%")
                            ->limit(50)
                            ->pluck('name', 'id')
                            ->all();
                    })
                    ->getOptionLabelUsing(fn ($value): ?string => \App\Models\User::find($value)?->name)
                    ->required(),
                Select::make('updated_by')
                    ->label('Updated By')
                    ->searchable()
                    ->getSearchResultsUsing(function (string $search): array {
                        return \App\Models\User::query()
                            ->where('name', 'like', "%{$search}%")
                            ->limit(50)
                            ->pluck('name', 'id')
                            ->all();
                    })
                    ->getOptionLabelUsing(fn ($value): ?string => \App\Models\User::find($value)?->name)
                    ->required(),
            ]);
    }
}
