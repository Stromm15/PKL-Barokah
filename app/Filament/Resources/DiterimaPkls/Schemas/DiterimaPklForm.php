<?php

namespace App\Filament\Resources\DiterimaPkls\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class DiterimaPklForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            //    Select::make('nis')
            //         ->label('Nama Siswa')
            //         ->required()
            //         ->relationship('siswa', 'nama_siswa')
            //         ->searchable()
            //         ->preload(),
            //     Select::make('id_perusahaan')
            //         ->label('Perusahaan Mitra')
            //         ->required()
            //         ->relationship('perusahaan', 'nama_perusahaan')
            //         ->searchable()
            //         ->preload(),
            //     DatePicker::make('tgl_mulai')
            //         ->label('Tanggal Mulai')
            //         ->required()
            //         ->native(false),
            //     DatePicker::make('tgl_selesai')
            //         ->label('Tanggal Selesai')
            //         ->required()
            //         ->afterOrEqual('tgl_mulai')
            //         ->native(false),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'Diterima' => 'Diterima',
                        'Mengajukan' => 'Mengajukan',
                        'Ditolak' => 'Ditolak',
                        'Aktif' => 'Aktif',
                        'Selesai' => 'Selesai',
                    ])
                    ->live()
                    ->disabled(fn () => Auth::user()->role !== 'admin')
                    ->helperText(fn () =>
                        Auth::user()->role !== 'admin'
                            ? 'Status PKL hanya dapat diubah oleh Admin.'
                            : null
                    )
                    ->required(),

                TextInput::make('nilai')
                    ->label('Nilai Perusahaan')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(0)
                    ->required(fn (Get $get) => $get('status') === 'Selesai')
                    ->disabled(fn (Get $get) => $get('status') !== 'Selesai')

                    ->helperText(fn (Get $get) => 
                        $get('status') !== 'Selesai'
                            ? 'Nilai hanya dapat diubah jika status PKL sudah Selesai.'
                            : 'Masukkan nilai siswa.'
                    )
                    ->dehydrated(),
            ]);
    }
}
