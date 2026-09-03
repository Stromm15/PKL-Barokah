<?php

namespace App\Filament\Resources\Pkls\Pages;

use App\Filament\Resources\Pkls\PklResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPkls extends ListRecords
{
    protected static string $resource = PklResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
