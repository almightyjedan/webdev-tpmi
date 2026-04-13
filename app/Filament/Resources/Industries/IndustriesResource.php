<?php

namespace App\Filament\Resources\Industries;

use App\Filament\Resources\Industries\Pages\CreateIndustries;
use App\Filament\Resources\Industries\Pages\EditIndustries;
use App\Filament\Resources\Industries\Pages\ListIndustries;
use App\Filament\Resources\Industries\Schemas\IndustriesForm;
use App\Filament\Resources\Industries\Tables\IndustriesTable;
use App\Models\Industries;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IndustriesResource extends Resource
{
    protected static ?string $model = Industries::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Industries';

    public static function form(Schema $schema): Schema
    {
        return IndustriesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IndustriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListIndustries::route('/'),
            'create' => CreateIndustries::route('/create'),
            'edit' => EditIndustries::route('/{record}/edit'),
        ];
    }
}
