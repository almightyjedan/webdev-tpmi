<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use App\Models\DetailPump;
use Illuminate\Database\Eloquent\Builder;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('main_title')
                    ->label('Main Title')
                    ->required(),

                TextInput::make('title')
                    ->label('Project Title')
                    ->required(),

                Select::make('industries')
                    ->label('Related Industries')
                    ->relationship('industries', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->live()
                    ->required(),

                Select::make('detailPumps')
                    ->label('Pumps Used')
                    ->relationship('detailPumps', 'model_name')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->required()
                    ->options(fn ($get) => 
                        DetailPump::query()
                            ->when($get('industries'), fn ($q, $ids) => 
                                $q->whereHas('industries', fn ($inner) => $inner->whereIn('industries.id', (array) $ids))
                            )
                            ->pluck('model_name', 'id')
                    ),

                Textarea::make('description')
                    ->label('Description')
                    ->required()
                    ->columnSpanFull(),

                FileUpload::make('images')
                    ->label('Project Images')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->directory('project-images')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}