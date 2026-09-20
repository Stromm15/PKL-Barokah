<?php

namespace App\Filament\Resources\Pkls\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PklsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->whereIn('status', ['Aktif', 'Ditolak', 'Mengajukan']))
            ->columns([
                TextColumn::make('nis')
                    ->searchable(),
                TextColumn::make('siswa.nama_siswa')
                    ->searchable(),
                TextColumn::make('siswa.jurusan.jurusan')
                    ->searchable(),
                TextColumn::make('perusahaan.nama_perusahaan')
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
                        'Selesai' => 'success',
                        default => 'gray',
                    })
                    ->searchable(),
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
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
