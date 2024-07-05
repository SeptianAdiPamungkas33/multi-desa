<?php

namespace App\Http\Controllers;

use App\Http\Requests\GaleriRequest;
use App\Models\Footer;
use App\Models\Galeri;
use App\Models\Header;
use App\Models\Layanan;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GaleriController extends Controller
{
    public function index()
    {
        $website = Website::where('desa_id', auth()->user()->desa_id)->first();
        $galeri = Galeri::where('website_id', $website->id)->get();

        return view('penulis.galeri.index', [
            'title' => 'Edit Data Tentang Kami',
            'galeri' => $galeri,
        ]);
    }

    public function create()
    {
        $galeri = Galeri::all();

        return view('penulis.galeri.create', [
            'title' => 'Tambah Galeri',
            'case' => 'post',
            'galeri' => $galeri
        ]);
    }

    public function store(GaleriRequest $request)
    {
        // Validate the incoming request
        $validatedData = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName; // Store relative path

            // Assign image path to validated data
            $validatedData['image'] = $imagePath;
        }

        // Automatically assign website_id
        // Get the website_id for the current user's desa
        $website = Website::where('desa_id', Auth::user()->desa_id)->first();
        if (!$website) {
            return redirect()->route('galeri.index')->with('error', 'Website tidak ditemukan untuk desa pengguna saat ini.');
        }
        $validatedData['website_id'] = $website->id;

        $validatedData['desa_id'] = Auth::user()->desa_id;

        // Create the Galeri record
        $galeri = Galeri::create($validatedData);

        if ($galeri) {
            return redirect()->route('galeri.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('galeri.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function update(GaleriRequest $request, $id)
    {
        // Validate the incoming request
        $validatedData = $request->validated();

        // Find the Galeri record
        $galeri = Galeri::find($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image file
            if (file_exists(public_path($galeri->image))) {
                unlink(public_path($galeri->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;

            // Assign image path to validated data
            $validatedData['image'] = $imagePath;
        }

        // Get the website_id for the current user's desa
        $website = Website::where('desa_id', Auth::user()->desa_id)->first();
        if (!$website) {
            return redirect()->route('postingan.index')->with('error', 'Website tidak ditemukan untuk desa pengguna saat ini.');
        }
        $validatedData['website_id'] = $website->id;

        // Update the Galeri record
        $result = $galeri->update($validatedData);

        if ($result) {
            return redirect()->route('galeri.index')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('galeri.index')->with('error', 'Data gagal diubah');
        }
    }
    public function edit($id)
    {
        $galeri = Galeri::find($id);

        return view('penulis.galeri.edit', [
            'title' => 'Edit Galeri',
            'case' => 'put',
            'galeri' => $galeri
        ]);
    }

    public function destroy($id)
    {
        $galeri = Galeri::find($id);

        // Delete the image file
        if (file_exists(public_path($galeri->image))) {
            unlink(public_path($galeri->image));
        }

        // Delete the Galeri record
        $result = $galeri->delete();

        if ($result) {
            return redirect()->route('galeri.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('galeri.index')->with('error', 'Data gagal dihapus');
        }
    }
}
