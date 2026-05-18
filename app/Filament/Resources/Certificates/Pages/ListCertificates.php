<?php

namespace App\Filament\Resources\Certificates\Pages;

use App\Filament\Resources\Certificates\CertificateResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCertificates extends ListRecords
{
    protected static string $resource = CertificateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function mount(): void
    {
        $record = \App\Models\Certificate::first();

        if ($record) {
            $this->redirect(static::getResource()::getUrl('edit', ['record' => $record]));
        } else {
            $this->redirect(static::getResource()::getUrl('create'));
        }
    }
}
