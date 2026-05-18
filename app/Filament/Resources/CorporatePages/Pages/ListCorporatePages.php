<?php

namespace App\Filament\Resources\CorporatePages\Pages;

use App\Filament\Resources\CorporatePages\CorporatePagesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCorporatePages extends ListRecords
{
    protected static string $resource = CorporatePagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function mount(): void
    {
        $record = \App\Models\CorporatePages::first();

        if ($record) {
            $this->redirect(static::getResource()::getUrl('edit', ['record' => $record]));
        } else {
            $this->redirect(static::getResource()::getUrl('create'));
        }
    }
}
