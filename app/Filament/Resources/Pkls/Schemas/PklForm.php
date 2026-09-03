<?php

namespace App\Filament\Resources\Pkls\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PklForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('nis')
                    ->label('Nama Siswa')
                    ->required()
                    ->relationship('siswa', 'nama_siswa'),
                Select::make('id_perusahaan')
                    ->required()
                    ->relationship('perusahaan', 'nama_perusahaan'),
                Select::make('id_pembimbing')
                    ->required()
                    ->relationship('pembimbing', 'nama_pembimbing'),
                TextInput::make('nilai.nilai_perusahaan')
                    ->label('Nilai Perusahaan')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
            ]);
    }
}
