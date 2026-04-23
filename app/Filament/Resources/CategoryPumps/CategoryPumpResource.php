<?php

namespace App\Filament\Resources\CategoryPumps;

use App\Filament\Resources\CategoryPumps\Pages\CreateCategoryPump;
use App\Filament\Resources\CategoryPumps\Pages\EditCategoryPump;
use App\Filament\Resources\CategoryPumps\Pages\ListCategoryPumps;
use App\Filament\Resources\CategoryPumps\Schemas\CategoryPumpForm;
use App\Filament\Resources\CategoryPumps\Tables\CategoryPumpsTable;
use App\Models\CategoryPump;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CategoryPumpResource extends Resource
{
    protected static string|\UnitEnum|null $navigationGroup = 'Pump Management';
    
    protected static ?string $model = CategoryPump::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Category Pump';

    public static function form(Schema $schema): Schema
    {
        return CategoryPumpForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CategoryPumpsTable::configure($table);
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
            'index' => ListCategoryPumps::route('/'),
            'create' => CreateCategoryPump::route('/create'),
            'edit' => EditCategoryPump::route('/{record}/edit'),
        ];
    }
}
