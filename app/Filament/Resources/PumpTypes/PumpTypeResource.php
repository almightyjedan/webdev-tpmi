<?php

namespace App\Filament\Resources\PumpTypes;

use App\Filament\Resources\PumpTypes\Pages\CreatePumpType;
use App\Filament\Resources\PumpTypes\Pages\EditPumpType;
use App\Filament\Resources\PumpTypes\Pages\ListPumpTypes;
use App\Filament\Resources\PumpTypes\Schemas\PumpTypeForm;
use App\Filament\Resources\PumpTypes\Tables\PumpTypesTable;
use App\Models\PumpType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PumpTypeResource extends Resource
{
    protected static ?string $model = PumpType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Pump Type';

    public static function form(Schema $schema): Schema
    {
        return PumpTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PumpTypesTable::configure($table);
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
            'index' => ListPumpTypes::route('/'),
            'create' => CreatePumpType::route('/create'),
            'edit' => EditPumpType::route('/{record}/edit'),
        ];
    }
}
