<?php

namespace App\Filament\Resources\CategoryPumps\Pages;

use App\Filament\Resources\CategoryPumps\CategoryPumpResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCategoryPump extends EditRecord
{
    protected static string $resource = CategoryPumpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
