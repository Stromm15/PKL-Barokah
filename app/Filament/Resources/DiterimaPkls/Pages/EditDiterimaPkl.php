<?php

namespace App\Filament\Resources\DiterimaPkls\Pages;

use App\Filament\Resources\DiterimaPkls\DiterimaPklResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDiterimaPkl extends EditRecord
{
    protected static string $resource = DiterimaPklResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
