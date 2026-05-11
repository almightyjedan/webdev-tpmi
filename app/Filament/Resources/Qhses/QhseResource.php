<?php

namespace App\Filament\Resources\Qhses;

use App\Filament\Resources\Qhses\Pages\CreateQhse;
use App\Filament\Resources\Qhses\Pages\EditQhse;
use App\Filament\Resources\Qhses\Pages\ListQhses;
use App\Filament\Resources\Qhses\Schemas\QhseForm;
use App\Filament\Resources\Qhses\Tables\QhsesTable;
use App\Models\Qhse;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class QhseResource extends Resource
{
    protected static ?string $model = Qhse::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'QHSE';

    public static function form(Schema $schema): Schema
    {
        return QhseForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QhsesTable::configure($table);
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
            'index' => ListQhses::route('/'),
            'create' => CreateQhse::route('/create'),
            'edit' => EditQhse::route('/{record}/edit'),
        ];
    }
}
