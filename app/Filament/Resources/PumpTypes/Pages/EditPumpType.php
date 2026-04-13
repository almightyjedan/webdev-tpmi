<?php

namespace App\Filament\Resources\PumpTypes\Pages;

use App\Filament\Resources\PumpTypes\PumpTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPumpType extends EditRecord
{
    protected static string $resource = PumpTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
