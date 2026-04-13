<?php

namespace App\Filament\Resources\CategoryPumps\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;

class CategoryPumpForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Category Name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->label('URL Slug')
                    ->required()
                    ->unique('category_pumps', 'slug', ignoreRecord: true),

                FileUpload::make('image')
                    ->label('Category Image')
                    ->image()
                    ->directory('categories')
                    ->imageEditor()
                    ->required(),
            ]);
    }
}