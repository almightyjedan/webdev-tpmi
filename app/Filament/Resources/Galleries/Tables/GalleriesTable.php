<?php

namespace App\Filament\Resources\Galleries\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;

class GalleriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('preview')
                    ->label('Preview')
                    ->state(fn ($record) => 
                        $record->type === 'video' ? ($record->thumbnail ?? $record->file_path) : $record->file_path
                    )
                    ->circular(),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->description(fn ($record) => $record->category),
                
                IconColumn::make('type')
                    ->icon(fn (string $state): string => match ($state) {
                        'video' => 'heroicon-o-video-camera',
                        'image' => 'heroicon-o-camera',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'video' => 'danger',
                        'image' => 'success',
                    }),

                TextColumn::make('created_at')
                    ->label('Uploaded At')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}