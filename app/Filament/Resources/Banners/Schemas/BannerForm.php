<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Homepage Banners')
                    ->description('Upload background images for the main sections.')
                    ->schema([
                        FileUpload::make('photo_1')
                            ->label('Left Photo (Photo 1)')
                            ->image()
                            ->directory('banners')
                            ->imageEditor()
                            ->required(),

                        FileUpload::make('photo_2')
                            ->label('Right Photo (Photo 2)')
                            ->image()
                            ->directory('banners')
                            ->imageEditor()
                            ->required(),
                    ])->columns(2),

                Section::make('Homepage Videos')
                    ->description('Upload video background (Format: MP4, Max: 100MB disarankan)')
                    ->schema([
                        FileUpload::make('video_1')
                            ->label('Video Banner Utama (Atas)')
                            ->directory('videos')
                            ->acceptedFileTypes(['video/mp4', 'video/quicktime', 'video/x-msvideo'])
                            ->maxSize(102400)
                            ->preserveFilenames(),

                        FileUpload::make('video_2')
                            ->label('Video Banner Kedua (Bawah)')
                            ->directory('videos')
                            ->acceptedFileTypes(['video/mp4'])
                            ->maxSize(102400),
                    ])->columns(2),
            ]);
    }
}