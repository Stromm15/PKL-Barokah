<?php

namespace App\Filament\Resources\Siswas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SiswaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nis')
                    ->required(),
                TextInput::make('nama_siswa')
                    ->required(),
                TextInput::make('jurusan_id')
                    ->required()
                    ->numeric(),
                TextInput::make('kelas')
                    ->required(),
                TextInput::make('no_hp')
                    ->required(),
            ]);
    }
}
