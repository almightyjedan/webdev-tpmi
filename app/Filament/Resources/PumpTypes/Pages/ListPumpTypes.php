<?php

namespace App\Filament\Resources\PumpTypes\Pages;

use App\Filament\Resources\PumpTypes\PumpTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPumpTypes extends ListRecords
{
    protected static string $resource = PumpTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
