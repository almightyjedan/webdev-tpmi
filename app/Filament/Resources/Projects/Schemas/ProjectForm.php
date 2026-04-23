<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload; // Import ini
use Filament\Schemas\Schema;

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
