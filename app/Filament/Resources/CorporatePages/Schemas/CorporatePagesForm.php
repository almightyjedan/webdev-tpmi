<?php

namespace App\Filament\Resources\CorporatePages\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;

class CorporatePagesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Corporate Content')
                    ->tabs([
                        
                        // TAB 1: CORPORATE DATA (Struktur yang sudah ada)
                        Tabs\Tab::make('Corporate Data')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Section::make('Corporate Information')
                                    ->schema([
                                        Repeater::make('corporate_info')
                                            ->schema([
                                                TextInput::make('label'),
                                                TextInput::make('value'),
                                            ])->columns(2)->reorderable(),
                                    ]),

                                Section::make('Affiliated Companies')
                                    ->schema([
                                        // Ini list perusahaan + deskripsi masing-masing
                                        Repeater::make('affiliates')
                                            ->schema([
                                                TextInput::make('name')
                                                    ->label('Company Name'),
                                                RichEditor::make('description') // Deskripsi tiap affiliate masuk sini
                                                    ->label('Affiliate Description'),
                                            ])
                                            ->columns(2)
                                            ->reorderable()
                                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null),
                                    ]),

                                Section::make('Facilities')
                                    ->schema([
                                        RichEditor::make('facilities_description')->label('Description'),
                                        Repeater::make('facilities')
                                            ->schema([
                                                TextInput::make('name'),
                                                Textarea::make('specs')->required()->rows(3),
                                            ])->grid(2)->reorderable(),
                                    ]),
                            ]),

                        // TAB 2: CORPORATE PROFILE (Disesuaikan permintaan baru)
                        Tabs\Tab::make('Corporate Profile')
                            ->icon('heroicon-o-building-office')
                            ->schema([
                                Section::make('General Profile')
                                    ->schema([
                                        RichEditor::make('profile_content'),
                                        FileUpload::make('strategy_image')
                                            ->image()
                                            ->directory('corporate'),
                                    ]),

                                // Quality & Safety Policy pakai Repeater (Manual nambah tab/item)
                                Section::make('Quality & Safety Policy')
                                    ->schema([
                                        Repeater::make('quality_safety_policy')
                                            ->label('Policy Items')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Policy Title')
                                                    ->placeholder('e.g. Quality Policy'),
                                                RichEditor::make('content')
                                                    ->label('Policy Content'),
                                            ])
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
                                    ]),

                                Section::make('Core Competence')
                                    ->schema([
                                        RichEditor::make('core_competence_content'),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull()
            ]);
    }
}