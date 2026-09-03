<?php

namespace App\Filament\Resources\Pembimbings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PembimbingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_pembimbing')
                    ->required(),
                TextInput::make('no_hp')
                    ->minValue(0)
                    ->required(),
            ]);
    }
}
