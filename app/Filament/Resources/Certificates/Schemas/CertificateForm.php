<?php

namespace App\Filament\Resources\Certificates\Schemas;

use Filament\Schemas\Schema;

class CertificateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Bagian Deskripsi Umum
                \Filament\Schemas\Components\Section::make('Page Header')
                    ->schema([
                        \Filament\Forms\Components\RichEditor::make('general_description')
                            ->label('Deskripsi Umum')
                            ->columnSpanFull(),
                    ]),

                // Bagian Galeri (JSON)
                \Filament\Schemas\Components\Section::make('Certificate Gallery')
                    ->schema([
                        \Filament\Forms\Components\Repeater::make('certificate_items')
                            ->label('Daftar Sertifikat')
                            ->schema([
                                \Filament\Forms\Components\TextInput::make('image_title')
                                    ->label('Judul Sertifikat')
                                    ->required(),
                                
                                \Filament\Forms\Components\FileUpload::make('image')
                                    ->label('File Gambar')
                                    ->image()
                                    ->directory('certificates')
                                    ->required(),
                            ])
                            ->grid(2) // Tampilan 2 kolom di admin
                            ->reorderable()
                            ->itemLabel(fn (array $state): ?string => $state['image_title'] ?? null),
                    ]),
            ]);
    }
}