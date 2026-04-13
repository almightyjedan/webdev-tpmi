<?php

namespace App\Filament\Resources\DetailPumps\Pages;

use App\Filament\Resources\DetailPumps\DetailPumpResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDetailPump extends EditRecord
{
    protected static string $resource = DetailPumpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
