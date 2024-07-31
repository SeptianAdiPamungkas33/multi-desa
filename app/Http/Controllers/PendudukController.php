<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Models\Website;

class PendudukController extends Controller
{
    public function index()
    {
        $website = Website::where('user_id', auth()->user()->id)->first();
        $penduduk = Penduduk::where('website_id', $website->id)->first();

        return view('penulis.penduduk.penduduk', [
            'title' => 'Edit Data Penduduk',
            'website' => $website,
            'penduduk' => $penduduk,
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

        return view('penulis.penduduk.piechart')->with('success', 'Data Penduduk berhasil diperbarui');
    }

    public function piechart()
    {
        $website = Website::where('user_id', auth()->user()->id)->first();
        $penduduk = Penduduk::where('website_id', $website->id)->first();

        return view('penulis.penduduk.piechart', [
            'title' => 'Pie Chart Data Penduduk',
            'website' => $website,
            'penduduk' => $penduduk,
        ]);
    }
}
