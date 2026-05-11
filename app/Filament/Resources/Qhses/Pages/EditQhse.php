<?php

namespace App\Filament\Resources\Qhses\Pages;

use App\Filament\Resources\Qhses\QhseResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditQhse extends EditRecord
{
    protected static string $resource = QhseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
