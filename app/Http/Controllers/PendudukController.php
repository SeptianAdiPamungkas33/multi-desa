<?php

namespace App\Http\Controllers;

use App\Charts\PendudukChart;
use App\Exports\PendudukExport;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Models\Website;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\PieChart;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class PendudukController extends Controller
{
    public function index()
    {
        $website = Website::where('user_id', auth()->user()->id)->first();
        $penduduk = Penduduk::where('website_id', $website->id)->first();
        $user = User::findOrFail($penduduk->website->user_id);

        return view('penulis.penduduk.penduduk', [
            'title' => 'Edit Data Penduduk',
            'website' => $website,
            'penduduk' => $penduduk,
            'user' => $user,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:penduduk,id',
            'laki' => 'required|integer|min:0',
            'perempuan' => 'required|integer|min:0'
        ]);

        $penduduk = Penduduk::find($id);

        $laki = $request->input('laki');
        $perempuan = $request->input('perempuan');
        $total_penduduk = $laki + $perempuan;
        $persen_laki = $total_penduduk ? ($laki / $total_penduduk) * 100 : 0;
        $persen_perempuan = $total_penduduk ? ($perempuan / $total_penduduk) * 100 : 0;

        $penduduk->update([
            'laki' => $laki,
            'perempuan' => $perempuan,
            'total_penduduk' => $total_penduduk,
            'persen_laki' => $persen_laki,
            'persen_perempuan' => $persen_perempuan,
            'website_id' => $penduduk->website_id,
        ]);

        return redirect()->route('penduduk.piechart')
            ->with('success', 'Data Penduduk berhasil diperbarui');
    }

    public function piechart(PendudukChart $chart)
    {
        $website = Website::where('user_id', auth()->user()->id)->first();
        $penduduk = Penduduk::where('website_id', $website->id)->first();
        $user = User::findOrFail($penduduk->website->user_id);

        return view('penulis.penduduk.piechart', [
            'chart' => $chart->build(),
            'penduduk' => $penduduk,
            'user' => $user,
        ]);
    }

    public function laporanpenduduk()
    {
        $penduduk = Penduduk::all();
        $admindesa = User::where('role_id', 2)->get();
        // $user = User::findOrFail($penduduk->website->user_id);

        return view('penulis.penduduk.laporan-penduduk', [
            'title' => 'Laporan Data Penduduk',
            'penduduk' => $penduduk,
            'admindesa' => $admindesa,
            // 'user' => $user,
        ]);
    }

    public function laporanpendudukdetail($id, PendudukChart $chart)
    {
        $penduduk = Penduduk::findOrFail($id);
        $user = User::findOrFail($penduduk->website->user_id);

        return view('penulis.penduduk.laporan-penduduk-detail', [
            'title' => 'Laporan Data Penduduk',
            'penduduk' => $penduduk,
            'chart' => $chart->build(),
            'user' => $user,
        ]);
    }

    public function export()
    {

        return Excel::download(new PendudukExport, 'penduduk.xlsx');
    }
}
