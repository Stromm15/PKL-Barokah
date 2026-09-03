<?php

namespace App\Filament\Widgets;

use App\Models\Perusahaan;
use Filament\Widgets\ChartWidget;

class SiswaPerusahaanChart extends ChartWidget
{
    protected ?string $heading = 'Jumlah Siswa per Perusahaan Mitra';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $perusahaans = Perusahaan::withCount('pkls')->get();

        $labels = $perusahaans->pluck('nama_perusahaan')->toArray();
        $data = $perusahaans->pluck('pkls_count')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Siswa PKL',
                    'data' => $data,
                    'backgroundColor' => 'rgba(16, 185, 129, 0.6)',
                    'borderColor' => '#10b981',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
