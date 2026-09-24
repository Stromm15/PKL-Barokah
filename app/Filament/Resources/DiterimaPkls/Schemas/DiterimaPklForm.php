<?php

namespace App\Filament\Resources\DiterimaPkls\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class DiterimaPklForm
{
    public static function rata($get, $set): void
    {
        // $total = collect($get('../../details') ?? [])->sum(fn ($detail) => $detail['subtotal'] ?? []);

        $nilai1 = $get('nilai_1') ?? 0;
        $nilai2 = $get('nilai_2') ?? 0;
        $nilai3 = $get('nilai_3') ?? 0;
        $nilai4 = $get('nilai_4') ?? 0;

        $rata = ($nilai1 + $nilai2 + $nilai3 + $nilai4) / 4;

        $set('rata_rata', $rata);
    }

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
                    ->helperText(fn () => Auth::user()->role !== 'admin'
                            ? 'Status PKL hanya dapat diubah oleh Admin.'
                            : null
                    )
                    ->required(),

                TextInput::make('nilai_1')
                    ->label('Nilai menerapkan softskill yang dibutuhkan dalam dunia kerja')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(0)
                    ->live()
                    ->afterStateUpdated(function ($get, $set) {
                        static::rata($get, $set);
                    })
                    ->required(fn (Get $get) => $get('status') === 'Selesai')
                    ->disabled(fn (Get $get) => $get('status') !== 'Selesai')
                    // ->placeholder(fn (Get $get) =>
                    //     $get('status') !== 'Selesai'
                    //         ? 'Nilai hanya dapat diubah jika status PKL sudah Selesai.'
                    //         : 'Masukkan nilai siswa.')

                    // ->helperText(fn (Get $get) =>
                    //     $get('status') !== 'Selesai'
                    //         ? 'Nilai hanya dapat diubah jika status PKL sudah Selesai.'
                    //         : 'Masukkan nilai siswa.'
                    // )
                    ->dehydrated(),
                TextInput::make('nilai_2')
                    ->label('Nilai menerapkan norma, pos, dan k3lh yang ada pada dunia kerja')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(0)
                    ->live()
                    ->afterStateUpdated(function ($get, $set) {
                        static::rata($get, $set);
                    })
                    ->required(fn (Get $get) => $get('status') === 'Selesai')
                    ->disabled(fn (Get $get) => $get('status') !== 'Selesai')
                    ->dehydrated(),
                TextInput::make('nilai_3')
                    ->label('Nilai menerapkan kompotensi teksnis yang sudah dipelajari di sekolah atau baru dipelajari pada dunia kerja ')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(0)
                    ->live()
                    ->afterStateUpdated(function ($get, $set) {
                        static::rata($get, $set);
                    })
                    ->required(fn (Get $get) => $get('status') === 'Selesai')
                    ->disabled(fn (Get $get) => $get('status') !== 'Selesai')
                    ->dehydrated(),
                TextInput::make('nilai_4')
                    ->label('Nilai memahami alur bisnis dunia kerja ')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(0)
                    ->live()
                    ->afterStateUpdated(function ($get, $set) {
                        static::rata($get, $set);
                    })
                    ->required(fn (Get $get) => $get('status') === 'Selesai')
                    ->disabled(fn (Get $get) => $get('status') !== 'Selesai')
                    ->dehydrated(),
                TextInput::make('rata_rata')
                    ->label('Nilai Rata-rata')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(0)
                    ->readOnly()
                    ->live()
                    ->dehydrated()
                    ->helperText(fn (Get $get) => $get('status') !== 'Selesai'
                            ? 'Nilai hanya dapat diubah jika status PKL sudah Selesai.'
                            : 'Masukkan nilai siswa.'
                    ),

            ]);
    }
}
