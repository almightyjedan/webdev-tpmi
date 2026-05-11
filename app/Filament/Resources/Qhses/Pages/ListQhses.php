<?php

namespace App\Filament\Resources\Qhses\Pages;

use App\Filament\Resources\Qhses\QhseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQhses extends ListRecords
{
    protected static string $resource = QhseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
