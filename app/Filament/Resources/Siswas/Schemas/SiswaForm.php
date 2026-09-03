<?php

namespace App\Filament\Resources\Siswas\Schemas;

use Filament\Forms\Components\Select;
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
                Select::make('jurusan_id')
                    ->relationship('jurusan', 'jurusan')
                    ->required(),
                TextInput::make('kelas')
                    ->required(),
                TextInput::make('no_hp')
                    ->required(),
            ]);
    }
}
