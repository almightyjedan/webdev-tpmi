<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Schemas\Components\Utilities\Get;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Media Upload')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Gallery')
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('category')
                            ->label('Kategori')
                            ->placeholder('Contoh: Sejarah, CSR, Event'),

                        // Input File (Multiple hanya aktif pas Create)
                        FileUpload::make('file_path')
                            ->label('Pilih File')
                            ->directory('gallery')
                            // Kita buat multiple hanya jika ini record baru (Create)
                            ->multiple(fn ($record) => $record === null) 
                            ->required()
                            ->columnSpanFull(),

                        // Thumbnail HANYA muncul pas Edit & hanya jika tipenya Video
                        FileUpload::make('thumbnail')
                            ->label('Thumbnail / Cover')
                            ->directory('gallery/thumbs')
                            ->image()
                            // Sembunyikan saat buat (biar otomatis), munculkan saat edit
                            ->hiddenOn('create') 
                            ->visible(fn ($get) => $get('type') === 'video' || $get('type') === 'image')
                            ->columnSpanFull(),

                        Hidden::make('type')->default('image'),
                        Hidden::make('user_id')->default(auth()->id()),
                    ])
                    ->columns(2),
            ]);
    }
}