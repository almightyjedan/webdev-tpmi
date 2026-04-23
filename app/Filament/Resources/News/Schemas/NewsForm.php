<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Illuminate\Support\Str; // PASTIKAN INI ADA
use Filament\Schemas\Schema;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            FileUpload::make('image')
                ->image()
                ->directory('news')
                ->required(),

            TextInput::make('title')
                ->required()
                ->live(onBlur: true)
                // Gunakan function biasa jika arrow function (fn) error
                ->afterStateUpdated(function ($state, $set) {
                    $set('slug', Str::slug($state));
                }),

            TextInput::make('slug')
                ->required()
                ->dehydrated()
                ->unique('news', 'slug', ignoreRecord: true),

            Select::make('categories')
                ->relationship('categories', 'name')
                ->multiple()
                ->preload()
                ->searchable()
                ->createOptionForm([
                    TextInput::make('name')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(function ($state, $set) {
                            $set('slug', \Illuminate\Support\Str::slug($state));
                        }),
                    TextInput::make('slug')
                        ->required()
                        // TAMBAHKAN VALIDASI INI
                        ->unique('category_news', 'slug') 
                        ->validationMessages([
                            'unique' => 'Kategori ini sudah ada, silakan pilih dari list saja.',
                        ]),
                ]),

            TextInput::make('posted_by')
                ->default(fn() => auth()->user()->name)
                ->required(),

            DatePicker::make('posted_at')
                ->default(now())
                ->required(),

            Textarea::make('description')
                ->required()
                ->columnSpanFull(),
        ]);
    }
}