<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Header;
use App\Models\Tentangkami;
use App\Models\Website;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index()
    {
        $website = Website::where('user_id', auth()->user()->id)->first();
        $tentangkami = Tentangkami::where('website_id', $website->id)->first();


        return view('website.tentangkami.edit', [
            'title' => 'Edit Data Tentang Kami',
            'tentangkami' => $tentangkami,
            'website' => $website
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
        ]);


        $tentangkami = Tentangkami::find($id);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete the old image file
            // if (file_exists(public_path($tentangkami->image))) {
            //     unlink(public_path($tentangkami->image));
            // }

            $imageName = time() . '.' . $request->file('gambar')->getClientOriginalExtension();
            $storeImage = $request->file('gambar')->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        }

        $website = Website::where('desa_id', auth()->user()->desa_id)->first();

        $tentangkami->judul = $request->judul;
        $tentangkami->deskripsi = $request->deskripsi;
        $tentangkami->gambar = $imagePath;
        $tentangkami->website_id = $website->id;

        $result = $tentangkami->save();

        if ($result) {
            return redirect()->route('website.index')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('website.index')->with('error', 'Data gagal diubah');
        }
    }
}
