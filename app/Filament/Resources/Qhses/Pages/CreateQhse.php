<?php

namespace App\Filament\Resources\Qhses\Pages;

use App\Filament\Resources\Qhses\QhseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateQhse extends CreateRecord
{
    protected static string $resource = QhseResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);
    }
}
