<?php

namespace App\Filament\Resources\Pkls\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PklsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nis')
                    ->label('NIS')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('siswa.nama_siswa')
                    ->label('Nama Siswa')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('perusahaan.nama_perusahaan')
                    ->label('Nama Perusahaan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('pembimbing.nama_pembimbing')
                    ->label('Nama Pembimbing')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tgl_mulai')
                    ->label('Tgl Mulai')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('tgl_selesai')
                    ->label('Tgl Selesai')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'Aktif' => 'success',
                        'Selesai' => 'info',
                        'Menunggu' => 'warning',
                        'Dibatalkan' => 'danger',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),
                TextColumn::make('nilai.nilai_perusahaan')
                    ->label('Nilai')
                    ->searchable()
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
                SelectFilter::make('id_perusahaan')
                    ->label('Perusahaan')
                    ->relationship('perusahaan', 'nama_perusahaan'),
                SelectFilter::make('status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Selesai' => 'Selesai',
                        'Menunggu' => 'Menunggu',
                        'Dibatalkan' => 'Dibatalkan',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
