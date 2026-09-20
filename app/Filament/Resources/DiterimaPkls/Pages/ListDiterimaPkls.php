<?php

namespace App\Filament\Resources\DiterimaPkls\Pages;

use App\Filament\Resources\DiterimaPkls\DiterimaPklResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDiterimaPkls extends ListRecords
{
    protected static string $resource = DiterimaPklResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }
}
