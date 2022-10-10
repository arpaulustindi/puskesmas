<?php

namespace App\Filament\Resources\PasienGenderResource\Widgets;

use Filament\Widgets\PieChartWidget;
use App\Models\Pasien;
class PasienGenderChart extends PieChartWidget
{   

    protected static ?string $heading = 'Gender Pasien';

    protected function getData(): array
    {
        $dataL = Pasien::where('gender','=','Laki-Laki')->get()->count();
        $dataP = Pasien::where('gender','=','Perempuan')->get()->count();
        return [
            'datasets' => [
                [
                    'label' => 'Gender',
                    'data' => [$dataL,$dataP],
                ],
            ],
            'labels' => ['Laki - Laki','Perempuan'],
        ];
    }
}
