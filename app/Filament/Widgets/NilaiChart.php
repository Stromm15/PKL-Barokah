<?php

namespace App\Filament\Widgets;

use App\Models\Nilai;
use Filament\Widgets\ChartWidget;

class NilaiChart extends ChartWidget
{
    protected ?string $heading = 'Distribusi Nilai Siswa (Rentang Kelipatan 10)';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $ranges = [
            '10' => [1, 10],
            '20' => [11, 20],
            '30' => [21, 30],
            '40' => [31, 40],
            '50' => [41, 50],
            '60' => [51, 60],
            '70' => [61, 70],
            '80' => [71, 80],
            '90' => [81, 90],
            '100' => [91, 100],
        ];

        $scores = Nilai::pluck('nilai_perusahaan');

        $data = [];
        foreach ($ranges as $label => [$min, $max]) {
            $data[] = $scores->filter(fn ($score) => $score >= $min && $score <= $max)->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Siswa',
                    'data' => $data,
                    'backgroundColor' => 'rgba(59, 130, 246, 0.6)',
                    'borderColor' => '#3b82f6',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => ['10', '20', '30', '40', '50', '60', '70', '80', '90', '100'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
