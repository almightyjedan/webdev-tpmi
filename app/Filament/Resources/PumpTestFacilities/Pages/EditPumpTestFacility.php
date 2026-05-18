<?php

namespace App\Filament\Resources\PumpTestFacilities\Pages;

use App\Filament\Resources\PumpTestFacilities\PumpTestFacilityResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPumpTestFacility extends EditRecord
{
    protected static string $resource = PumpTestFacilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
