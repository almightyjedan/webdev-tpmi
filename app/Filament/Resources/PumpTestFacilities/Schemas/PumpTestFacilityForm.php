<?php

namespace App\Filament\Resources\PumpTestFacilities\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class PumpTestFacilityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // 1. DESKRIPSI UTAMA & BANNER
                Section::make('Main Info')
                    ->description('Deskripsi utama dan banner halaman fasilitas uji pompa')
                    ->schema([
                        // Tambahkan ini untuk upload Main Image / Banner
                        FileUpload::make('hero_image')
                            ->label('Main Image (Banner)')
                            ->image()
                            ->directory('pump-test-facility')
                            ->columnSpanFull(),

                        RichEditor::make('main_description')
                            ->label('Main Description')
                            
                            ->columnSpanFull(),
                    ]),

                // 2. SPESIFIKASI & EQUIPMENT (Bentuk Tabel Dinamis)
                Section::make('Technical Data (Tables)')
                    ->description('Isi data spesifikasi dan peralatan dalam bentuk baris tabel')
                    ->schema([
                        // Tabel Spesifikasi
                        Repeater::make('specifications')
                            ->label('Specifications List')
                            ->schema([
                                TextInput::make('parameter')
                                    ->placeholder('Contoh: Max. Capacity')
                                    ,
                                TextInput::make('value')
                                    ->placeholder('Contoh: 3000 m³/h')
                                    ,
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['parameter'] ?? 'New Specification'),

                        // Tabel Equipment
                        Repeater::make('equipments')
                            ->label('Equipment List')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Equipment Name')
                                    ->placeholder('Contoh: Flowmeter')
                                    ,
                                TextInput::make('qty_or_spec')
                                    ->label('Qty / Specification')
                                    ->placeholder('Contoh: 2 Units or DN500')
                                    ,
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'New Equipment'),
                    ])->columns(2),

                // 3. PUMP TEST LINES & ENGINE TEST
                Section::make('Testing Capabilities')
                    ->schema([
                        RichEditor::make('pump_test_lines')
                            ->label('Pump Test Lines Description')
                            
                            ->columnSpanFull(),

                        // Tabel Pump Test With Engine
                        Repeater::make('pump_test_with_engine')
                            ->label('Pump Test with Engine Data')
                            ->schema([
                                TextInput::make('item')
                                    ->placeholder('Contoh: Engine Power')
                                    ,
                                TextInput::make('detail')
                                    ->placeholder('Contoh: Up to 1200 kW')
                                    ,
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->columnSpanFull()
                            ->itemLabel(fn (array $state): ?string => $state['item'] ?? 'New Engine Test Data'),
                    ]),

                // 4. LATEST ACTIVITY (Gambar + Deskripsi Rich Editor)
                Section::make('Latest Activity')
                    ->description('Daftar dokumentasi kegiatan terbaru di fasilitas uji pompa')
                    ->schema([
                        Repeater::make('latest_activities')
                            ->label('Activities')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Activity Image')
                                    ->image()
                                    ->directory('pump-test-activities')
                                    
                                    ->columnSpan(1),
                                
                                RichEditor::make('description')
                                    ->label('Activity Description')
                                    
                                    ->columnSpan(2),
                            ])
                            ->columns(3) // Gambar 1/3 lebar, RichEditor 2/3 lebar (menyamping)
                            ->collapsible()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}