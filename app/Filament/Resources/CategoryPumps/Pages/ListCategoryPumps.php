<?php

namespace App\Filament\Resources\CategoryPumps\Pages;

use App\Filament\Resources\CategoryPumps\CategoryPumpResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCategoryPumps extends ListRecords
{
    protected static string $resource = CategoryPumpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
