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

    public function mount(): void
    {
        $record = \App\Models\PumpTestFacility::first();

        if ($record) {
            $this->redirect(static::getResource()::getUrl('edit', ['record' => $record]));
        } else {
            $this->redirect(static::getResource()::getUrl('create'));
        }
    }
}
