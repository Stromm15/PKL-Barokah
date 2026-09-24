<?php

namespace App\Filament\Widgets;

use App\Models\Pkl;
use Filament\Widgets\ChartWidget;

class NilaiChart extends ChartWidget
{
    protected ?string $heading = 'Distribusi Nilai PKL';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $ranges = [
            '< 60',
            '60 - 69',
            '70 - 79',
            '80 - 89',
            '90 - 100',
        ];

        $scores = Pkl::query()
            ->whereNotNull('rata_rata')
            ->pluck('rata_rata')
            ->map(fn ($value) => (int) $value);

        $counts = [0, 0, 0, 0, 0];

        foreach ($scores as $score) {
            if ($score < 60) {
                $counts[0]++;
            } elseif ($score < 70) {
                $counts[1]++;
            } elseif ($score < 80) {
                $counts[2]++;
            } elseif ($score < 90) {
                $counts[3]++;
            } else {
                $counts[4]++;
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Siswa',
                    'data' => $counts,
                    'backgroundColor' => [
                        'rgba(239, 68, 68, 0.6)',
                        'rgba(251, 146, 60, 0.6)',
                        'rgba(250, 204, 21, 0.6)',
                        'rgba(34, 197, 94, 0.6)',
                        'rgba(59, 130, 246, 0.6)',
                    ],
                    'borderColor' => '#1f2937',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $ranges,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
