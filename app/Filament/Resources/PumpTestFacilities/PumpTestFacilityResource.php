<?php

namespace App\Filament\Resources\PumpTestFacilities;

use App\Filament\Resources\PumpTestFacilities\Pages\CreatePumpTestFacility;
use App\Filament\Resources\PumpTestFacilities\Pages\EditPumpTestFacility;
use App\Filament\Resources\PumpTestFacilities\Pages\ListPumpTestFacilities;
use App\Filament\Resources\PumpTestFacilities\Schemas\PumpTestFacilityForm;
use App\Filament\Resources\PumpTestFacilities\Tables\PumpTestFacilitiesTable;
use App\Models\PumpTestFacility;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PumpTestFacilityResource extends Resource
{
    protected static string|\UnitEnum|null $navigationGroup = 'What We Offer';

    protected static ?string $model = PumpTestFacility::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Pumpt Test Facility';

    public static function form(Schema $schema): Schema
    {
        return PumpTestFacilityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PumpTestFacilitiesTable::configure($table);
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
            'index' => ListPumpTestFacilities::route('/'),
            'create' => CreatePumpTestFacility::route('/create'),
            'edit' => EditPumpTestFacility::route('/{record}/edit'),
        ];
    }
}
