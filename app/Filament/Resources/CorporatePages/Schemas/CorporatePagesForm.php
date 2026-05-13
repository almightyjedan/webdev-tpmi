<?php

namespace App\Filament\Resources\CorporatePages\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;

class CorporatePagesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Bagian atas: Corporate Info (Dinamis Label & Value)
                Section::make('Corporate Information')
                    ->schema([
                        Repeater::make('corporate_info')
                            ->schema([
                                TextInput::make('label')
                                    ->required()
                                    ->placeholder('e.g. Established'),
                                TextInput::make('value')
                                    ->required()
                                    ->placeholder('e.g. 1984'),
                            ])
                            ->columns(2)
                            ->reorderable(),
                    ]),

                // Bagian Afiliasi
                Section::make('Affiliates')
                    ->schema([
                        Repeater::make('affiliates')
                            ->simple(
                                TextInput::make('name')->required()
                            )
                            ->reorderable(),
                    ]),

                // Bagian Bawah: Facilities (Deskripsi + Tabel)
                Section::make('Facilities')
                    ->schema([
                        RichEditor::make('facilities_description')
                            ->label('Description'),
                            
                        Repeater::make('facilities')
                            ->label('Machinery Table')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Machine Name')
                                    ->required(),
                                Textarea::make('specs')
                                    ->label('Specifications')
                                    ->required()
                                    ->rows(3),
                            ])
                            ->grid(2)
                            ->reorderable()
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null),
                    ]),
            ]);
    }
}