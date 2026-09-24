<?php

namespace App\Filament\Resources\Perusahaans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PerusahaanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_perusahaan')
                    ->required(),
                TextInput::make('alamat')
                    ->required(),
                Select::make('id_pic')
                    ->label('PIC')
                    ->relationship(
                        'pic',
                        'name',
                        fn ($query) => $query->where('role', 'pic')
                    )
                    ->searchable()
                    ->preload(),
            ]);
    }
}
