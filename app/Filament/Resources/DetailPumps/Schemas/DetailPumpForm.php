<?php

namespace App\Filament\Resources\DetailPumps\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DetailPumpForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_pump_id')
                    ->relationship('categoryPump', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                Select::make('pump_type_id')
                    ->relationship('pumpType', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                TextInput::make('model_name')
                    ->required()
                    ->placeholder('Contoh: CEN 100-200'),

                Select::make('industries')
                    ->label('Applied Industries')
                    ->relationship('industries', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->required(),

                Textarea::make('description')
                    ->columnSpanFull()
                    ->rows(3),
            ]);
    }
}
