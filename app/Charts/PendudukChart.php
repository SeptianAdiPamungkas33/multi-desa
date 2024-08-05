<?php

namespace App\Charts;

use App\Models\Penduduk;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PendudukChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        // Fetch data from the penduduk table
        $penduduk = Penduduk::first();  // Ambil data dari satu penduduk, atau sesuaikan dengan kebutuhan

        $totalLaki = $penduduk->laki;
        $totalPerempuan = $penduduk->perempuan;
        $totalPenduduk = $totalLaki + $totalPerempuan;

        $persenLaki = $totalPenduduk ? ($totalLaki / $totalPenduduk) * 100 : 0;
        $persenPerempuan = $totalPenduduk ? ($totalPerempuan / $totalPenduduk) * 100 : 0;

        return $this->chart->pieChart()
            ->setTitle('Distribusi Penduduk Berdasarkan Jenis Kelamin')
            ->setSubtitle('Data Terbaru')
            ->addData([round($persenLaki), round($persenPerempuan)]) // Menampilkan jumlah langsung
            ->setLabels([
                'Laki-laki: ' . number_format($persenLaki, 2) . '%',
                'Perempuan: ' . number_format($persenPerempuan, 2) . '%'
            ]);
    }
}
