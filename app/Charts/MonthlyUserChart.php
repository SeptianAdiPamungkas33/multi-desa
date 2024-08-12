<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\User;
use Carbon\Carbon;

class MonthlyUserChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(int $year): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Example logic to count admin desa added each month of the specified year
        $adminDesaData = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->where('role_id', 2)
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Fetch penulis data
        $penulisData = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->where('role_id', 3) // Assuming role_id 3 is for penulis
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $adminDesaCounts = [];
        $penulisCounts = [];
        for ($i = 1; $i <= 12; $i++) {
            $adminDesaCounts[] = $adminDesaData[$i] ?? 0;
            $penulisCounts[] = $penulisData[$i] ?? 0;
        }

        return $this->chart->lineChart()
            ->setTitle('User Registrations in ' . $year)
            ->setSubtitle('Monthly count of new Admin Desa and Penulis')
            ->addData('Admin Desa', $adminDesaCounts)
            ->addData('Penulis', $penulisCounts)
            ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
    }
}
