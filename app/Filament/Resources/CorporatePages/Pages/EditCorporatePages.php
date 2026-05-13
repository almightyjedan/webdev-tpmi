<?php

namespace App\Filament\Resources\CorporatePages\Pages;

use App\Filament\Resources\CorporatePages\CorporatePagesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCorporatePages extends EditRecord
{
    protected static string $resource = CorporatePagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
