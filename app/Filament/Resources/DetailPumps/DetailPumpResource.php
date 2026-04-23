<?php

namespace App\Filament\Resources\DetailPumps;

use App\Filament\Resources\DetailPumps\Pages\CreateDetailPump;
use App\Filament\Resources\DetailPumps\Pages\EditDetailPump;
use App\Filament\Resources\DetailPumps\Pages\ListDetailPumps;
use App\Filament\Resources\DetailPumps\Schemas\DetailPumpForm;
use App\Filament\Resources\DetailPumps\Tables\DetailPumpsTable;
use App\Models\DetailPump;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DetailPumpResource extends Resource
{
    protected static string|\UnitEnum|null $navigationGroup = 'Pump Management';
    
    protected static ?string $model = DetailPump::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Detail Pump';

    public static function form(Schema $schema): Schema
    {
        return DetailPumpForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DetailPumpsTable::configure($table);
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
            'index' => ListDetailPumps::route('/'),
            'create' => CreateDetailPump::route('/create'),
            'edit' => EditDetailPump::route('/{record}/edit'),
        ];
    }
}
