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

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Banner updated!';
    }
}
