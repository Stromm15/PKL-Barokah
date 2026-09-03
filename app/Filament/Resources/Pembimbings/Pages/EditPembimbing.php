<?php

namespace App\Filament\Resources\Pembimbings\Pages;

use App\Filament\Resources\Pembimbings\PembimbingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPembimbing extends EditRecord
{
    protected static string $resource = PembimbingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
