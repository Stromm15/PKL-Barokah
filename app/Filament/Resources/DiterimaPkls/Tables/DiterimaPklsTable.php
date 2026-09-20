<?php

namespace App\Filament\Resources\DiterimaPkls\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class DiterimaPklsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->whereIn('status', ['Aktif', 'Diterima', 'Selesai']))
            ->columns([
                TextColumn::make('nis')
                    ->searchable(),
                TextColumn::make('siswa.nama_siswa')
                    ->searchable(),
                TextColumn::make('siswa.jurusan.jurusan')
                    ->searchable(),
                TextColumn::make('perusahaan.nama_perusahaan')
                    ->searchable(),
                TextColumn::make('perusahaan.pembimbing.name')
                    ->searchable(),
                TextColumn::make('tgl_mulai')
                    ->date()
                    ->sortable(),
                TextColumn::make('tgl_selesai')
                    ->date()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Mengajukan' => 'warning',
                        'Diterima' => 'success',
                        'Ditolak' => 'danger',
                        'Aktif' => 'info',
                        'Selesai' => 'gray',
                        default => 'gray',
                    })
                    ->searchable(),
                TextColumn::make('nilai')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('jurusan_id')
                    ->relationship('siswa.jurusan', 'jurusan')
                    ->label('Jurusan'),
                SelectFilter::make('id_pembimbing')
                    ->relationship('pembimbing', 'name', (fn ($query) => $query->where('role', 'pembimbing')))
                    ->label('Pembimbing'),
                SelectFilter::make('perusahaan_id')
                    ->relationship('perusahaan', 'nama_perusahaan')
                    ->label('Perusahaan'),
                SelectFilter::make('status')
                    ->options([
                        'Diterima' => 'Diterima',
                        'Aktif' => 'Aktif',
                        'Selesai' => 'Selesai',
                    ])
                    ->label('Status'),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Masukan Nilai'),
                DeleteAction::make()->visible(fn () => Auth::user()->isAdmin())
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->visible(fn () => Auth::user()->isAdmin()),
                ]),
            ]);
    }
}
