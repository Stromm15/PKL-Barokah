<?php

namespace App\Filament\Resources\Pembimbings\Pages;

use App\Filament\Resources\Pembimbings\PembimbingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPembimbings extends ListRecords
{
    protected static string $resource = PembimbingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
