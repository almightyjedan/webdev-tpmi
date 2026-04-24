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
            ]);
    }
}