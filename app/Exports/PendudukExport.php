<?php

namespace App\Exports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class PendudukExport implements FromCollection, WithHeadings, WithStyles
{
    /**
     * Mengambil semua data penduduk
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Penduduk::all();
    }

    /**
     * Menambahkan heading pada tabel
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Laki-laki',
            'Perempuan',
            'Total Penduduk',
            'Persen Laki-laki',
            'Persen Perempuan',
            'Website ID',
            'Desa ID',
            'Nama Desa',
            'Kecamatan ID',
            'Nama Kecamatan',
            'Created At',
            'Updated At',
        ];
    }

    /**
     * Menerapkan style pada worksheet
     *
     * @param Worksheet $sheet
     * @return void
     */
    public function styles(Worksheet $sheet)
    {
        // Styling untuk heading
        $sheet->getStyle('A1:M1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4CAF50'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        // Set border untuk seluruh tabel
        $sheet->getStyle('A1:M' . $sheet->getHighestRow())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        // Menyesuaikan lebar kolom secara otomatis
        foreach (range('A', 'M') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
    }
}
