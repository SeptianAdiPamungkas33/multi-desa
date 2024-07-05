<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Header;
use App\Models\Layanan;
use App\Models\Website;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $website = Website::where('user_id', auth()->user()->id)->first();
        $layanan = Layanan::where('website_id', $website->id)->first();

        return view('website.layanan.edit', [
            'title' => 'Edit Data Tentang Kami',
            'layanan' => $layanan,
            'website' => $website
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'judul1' => 'required',
            'deskripsi1' => 'required',
            'gambar1' => 'required',
            'judul2' => 'required',
            'deskripsi2' => 'required',
            'gambar2' => 'required',
            'judul3' => 'required',
            'deskripsi3' => 'required',
            'gambar3' => 'required',
        ]);

        $website = Website::where('desa_id', auth()->user()->desa_id)->first();

        $layanan = Layanan::find($id);
        $layanan->judul1 = $request->judul1;
        $layanan->deskripsi1 = $request->deskripsi1;
        $layanan->gambar1 = $request->gambar1;
        $layanan->judul2 = $request->judul2;
        $layanan->deskripsi2 = $request->deskripsi2;
        $layanan->gambar2 = $request->gambar2;
        $layanan->judul3 = $request->judul3;
        $layanan->deskripsi3 = $request->deskripsi3;
        $layanan->gambar3 = $request->gambar3;

        $result = $layanan->save();

        if ($result) {
            return redirect()->route('website.index')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('website.index')->with('error', 'Data gagal diubah');
        }
    }
}
