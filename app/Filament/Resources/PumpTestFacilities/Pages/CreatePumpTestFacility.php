<?php

namespace App\Filament\Resources\PumpTestFacilities\Pages;

use App\Filament\Resources\PumpTestFacilities\PumpTestFacilityResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePumpTestFacility extends CreateRecord
{
    protected static string $resource = PumpTestFacilityResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);
    }
}
