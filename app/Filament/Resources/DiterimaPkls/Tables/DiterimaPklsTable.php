<?php

namespace App\Filament\Resources\DiterimaPkls\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class DiterimaPklsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function ($query) {
                $user = Auth::user();

                $query->whereIn('status', ['Selesai', 'Diterima']);

                if($user->role === 'pembimbing') {
                    $query->where('id_pembimbing', $user->id);
                }

            })
            ->columns([
                TextColumn::make('nis')
                    ->searchable(),
                TextColumn::make('siswa.nama_siswa')
                    ->searchable(),
                TextColumn::make('siswa.jurusan.jurusan')
                    ->searchable(),
                TextColumn::make('perusahaan.nama_perusahaan')
                    ->searchable(),
                TextColumn::make('perusahaan.pembimbing.nama_pembimbing')
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
