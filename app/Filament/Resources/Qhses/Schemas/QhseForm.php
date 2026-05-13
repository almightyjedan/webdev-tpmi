<?php

namespace App\Filament\Resources\Qhses\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;

class QhseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // SECTION 1: HERO
                Section::make('Hero & Introduction')
                    ->description('Atur tampilan atas halaman QHSE')
                    ->schema([
                        FileUpload::make('hero_image')
                            ->image()
                            ->directory('qhse')
                            ->columnSpanFull()
                            ->helperText('Rekomendasi ukuran: 1920x600px'),
                        
                        Grid::make(2)
                            ->schema([
                                TextInput::make('hero_title')
                                    ->label('Main Title')
                                    ->default('QHSE')
                                    ->required(),
                                TextInput::make('hero_subtitle')
                                    ->label('Subtitle')
                                    ->default('Quality, Health, Safety, and Environment'),
                            ]),

                        RichEditor::make('intro_text')
                            ->label('Introduction Paragraph')
                            ->placeholder('Tuliskan deskripsi umum mengenai komitmen QHSE perusahaan...')
                            ->columnSpanFull(),
                    ]),

                // SECTION 2: POLICIES (ACCORDION)
                Section::make('Policies & Programs')
                    ->description('Gunakan bagian ini untuk membuat daftar kebijakan yang bisa di-expand (Accordion)')
                    ->schema([
                        Repeater::make('content_blocks')
                            ->label('Accordion Items')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Policy Name')
                                    ->required()
                                    ->placeholder('Contoh: Quality Policy'),
                                RichEditor::make('content')
                                    ->label('Policy Detail')
                                    ->required(),
                            ])
                            ->collapsible()
                            ->cloneable()
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'New Policy Item'),
                    ]),

                // SECTION 3: MEDIA (GALLERY & VIDEO)
                Section::make('Media & Infographic')
                    ->description('Upload dokumentasi kegiatan dan alur kunjungan')
                    ->schema([
                        FileUpload::make('gallery_images')
                            ->label('Latest Activity Gallery')
                            ->multiple()
                            ->image()
                            ->reorderable()
                            ->directory('qhse/gallery')
                            ->columnSpanFull(),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('video_url')
                                    ->label('YouTube Video URL')
                                    ->placeholder('https://www.youtube.com/watch?v=...'),
                                FileUpload::make('infographic_image')
                                    ->label('Visiting Flow / Infographic')
                                    ->image()
                                    ->directory('qhse/infographic'),
                            ]),
                    ]),
            ]);
    }
}