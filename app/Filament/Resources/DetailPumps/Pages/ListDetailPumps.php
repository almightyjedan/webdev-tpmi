<?php

namespace App\Filament\Resources\DetailPumps\Pages;

use App\Filament\Resources\DetailPumps\DetailPumpResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDetailPumps extends ListRecords
{
    protected static string $resource = DetailPumpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
