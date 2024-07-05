<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostinganRequest;
use App\Models\Desa;
use App\Models\Kategori;
use App\Models\Postingan;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostinganController extends Controller
{
    public function index()
    {
        $website = Website::where('desa_id', auth()->user()->desa_id)->first();
        $postingan = Postingan::where('website_id', $website->id)->get();

        return view('postingan.index', [
            'title' => 'Postingan',
            'postingan' => $postingan
        ]);
    }

    public function create()
    {
        $desa = Desa::all();
        $kategori = Kategori::all();

        return view('postingan.create', [
            'title' => 'Tambah Data Postingan',
            'case' => 'post',
            'desa' => $desa,
            'kategori' => $kategori,
        ]);
    }

    public function store(PostinganRequest $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kategori_id' => 'required',
            // 'gambar' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
            'gambar' => 'sometimes|file|mimes:jpeg,png,jpg,gif,svg,mp4,mov,ogg,qt|max:20000', // Validasi gambar dan video
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $validatedData['gambar'] = 'images/' . $imageName; // Assign image path to validated data
        }

        // Get the website_id for the current user's desa
        $website = Website::where('desa_id', Auth::user()->desa_id)->first();
        if (!$website) {
            return redirect()->route('postingan.index')->with('error', 'Website tidak ditemukan untuk desa pengguna saat ini.');
        }
        $validatedData['website_id'] = $website->id;

        // Assign desa_id from the current authenticated user
        $validatedData['desa_id'] = Auth::user()->desa_id;

        // Create the Postingan record
        $result = Postingan::create($validatedData);

        if ($result) {
            return redirect()->route('postingan.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('postingan.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $postingan = Postingan::findOrFail($id);
        $desa = Desa::all();
        $kategori = Kategori::all();

        return view('postingan.edit', [
            'title' => 'Edit Data Postingan',
            'postingan' => $postingan,
            'desa' => $desa,
            'kategori' => $kategori,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kategori_id' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        $postingan = Postingan::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if (file_exists(public_path($postingan->gambar))) {
                unlink(public_path($postingan->gambar));
            }

            // Upload new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validatedData['gambar'] = 'images/' . $imageName; // Assign image path to validated data
        }

        $validatedData['website_id'] = Website::where('desa_id', Auth::user()->desa_id)->first()->id;

        $result = $postingan->update($validatedData);

        if ($result) {
            return redirect()->route('postingan.index')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('postingan.index')->with('error', 'Data gagal diubah');
        }
    }


    public function destroy($id)
    {
        $result = Postingan::destroy($id);

        if ($result) {
            return redirect()->route('postingan.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('postingan.index')->with('error', 'Data gagal dihapus');
        }
    }
}
