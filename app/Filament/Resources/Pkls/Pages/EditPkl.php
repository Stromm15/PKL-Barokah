<?php

namespace App\Filament\Resources\Pkls\Pages;

use App\Filament\Resources\Pkls\PklResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPkl extends EditRecord
{
    protected static string $resource = PklResource::class;

    protected function afterSave(): void
    {
        if ($this->record->status === 'Diterima') {
            $this->record->update([
                'id_pic' => $this->record->perusahaan->id_pic,
            ]);
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
