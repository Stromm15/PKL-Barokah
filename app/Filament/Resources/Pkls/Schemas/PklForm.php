<?php

namespace App\Filament\Resources\Pkls\Schemas;

use Filament\Forms\Components\DatePicker;
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
                    ->relationship('siswa', 'nama_siswa')
                    ->searchable()
                    ->preload(),
                Select::make('id_perusahaan')
                    ->label('Perusahaan Mitra')
                    ->required()
                    ->relationship('perusahaan', 'nama_perusahaan')
                    ->searchable()
                    ->preload(),
                Select::make('id_pembimbing')
                    ->label('Pembimbing Lapangan')
                    ->required()
                    ->relationship('pembimbing', 'nama_pembimbing')
                    ->searchable()
                    ->preload(),
                DatePicker::make('tgl_mulai')
                    ->label('Tanggal Mulai')
                    ->required()
                    ->native(false),
                DatePicker::make('tgl_selesai')
                    ->label('Tanggal Selesai')
                    ->required()
                    ->afterOrEqual('tgl_mulai')
                    ->native(false),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Selesai' => 'Selesai',
                        'Menunggu' => 'Menunggu',
                        'Dibatalkan' => 'Dibatalkan',
                    ])
                    ->default('Aktif')
                    ->required(),
                TextInput::make('nilai.nilai_perusahaan')
                    ->label('Nilai Perusahaan')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),
            ]);
    }
}
