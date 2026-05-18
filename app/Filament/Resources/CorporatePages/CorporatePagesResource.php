<?php

namespace App\Filament\Resources\CorporatePages;

use App\Filament\Resources\CorporatePages\Pages\CreateCorporatePages;
use App\Filament\Resources\CorporatePages\Pages\EditCorporatePages;
use App\Filament\Resources\CorporatePages\Pages\ListCorporatePages;
use App\Filament\Resources\CorporatePages\Schemas\CorporatePagesForm;
use App\Filament\Resources\CorporatePages\Tables\CorporatePagesTable;
use App\Models\CorporatePages;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CorporatePagesResource extends Resource
{
    protected static string|\UnitEnum|null $navigationGroup = 'About Us';

    protected static ?string $model = CorporatePages::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Corporate Data';

    public static function form(Schema $schema): Schema
    {
        return CorporatePagesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CorporatePagesTable::configure($table);
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
            'index' => ListCorporatePages::route('/'),
            'create' => CreateCorporatePages::route('/create'),
            'edit' => EditCorporatePages::route('/{record}/edit'),
        ];
    }
}
