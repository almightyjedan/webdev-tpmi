<?php

namespace App\Filament\Resources\PumpTestFacilities\Pages;

use App\Filament\Resources\PumpTestFacilities\PumpTestFacilityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPumpTestFacilities extends ListRecords
{
    protected static string $resource = PumpTestFacilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
