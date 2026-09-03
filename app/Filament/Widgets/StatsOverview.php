<?php

namespace App\Filament\Widgets;

use App\Models\Pembimbing;
use App\Models\Perusahaan;
use App\Models\Pkl;
use App\Models\Siswa;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Siswa', Siswa::count())
                ->description('Jumlah seluruh siswa terdaftar')
                ->descriptionIcon(Heroicon::OutlinedUsers)
                ->color('primary'),

            Stat::make('Perusahaan', Perusahaan::count())
                ->description('Mitra DU/DI tempat PKL')
                ->descriptionIcon(Heroicon::OutlinedBuildingOffice2)
                ->color('success'),

            Stat::make('Siswa PKL', Pkl::count())
                ->description('Jumlah data penempatan PKL')
                ->descriptionIcon(Heroicon::OutlinedBriefcase)
                ->color('warning'),

            Stat::make('Pembimbing', Pembimbing::count())
                ->description('Pembimbing lapangan PKL')
                ->descriptionIcon(Heroicon::OutlinedUserCircle)
                ->color('info'),
        ];
    }
}
