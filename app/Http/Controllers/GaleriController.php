<?php

namespace App\Http\Controllers;

use App\Http\Requests\GaleriRequest;
use App\Models\Galeri;
use App\Models\Media;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GaleriController extends Controller
{
    public function index()
    {
        $website = Website::where('desa_id', auth()->user()->desa_id)->first();
        $galeri = Galeri::where('website_id', $website->id)->with('media')->get();

        return view('penulis.galeri.index', [
            'title' => 'Edit Data Tentang Kami',
            'galeri' => $galeri,
        ]);
    }

    public function create()
    {
        return view('penulis.galeri.create', [
            'title' => 'Tambah Galeri',
            'case' => 'post'
        ]);
    }

    public function store(GaleriRequest $request)
    {
        // Validate the incoming request
        $validatedData = $request->validated();

        // Get the website_id for the current user's desa
        $website = Website::where('desa_id', Auth::user()->desa_id)->first();
        if (!$website) {
            return redirect()->route('galeri.index')->with('error', 'Website tidak ditemukan untuk desa pengguna saat ini.');
        }

        $validatedData['website_id'] = $website->id;

        // Create the Galeri record
        $galeri = Galeri::create($validatedData);

        // Handle multiple media upload
        if ($request->hasFile('filename')) {
            $mediaIds = [];
            foreach ($request->file('filename') as $media) {
                $mediaName = time() . '_' . $media->getClientOriginalName();
                $media->move(public_path('media'), $mediaName);
                $mediaPath = 'media/' . $mediaName; // Store relative path

                // Create the Media record
                $mediaRecord = Media::create([
                    'file_path' => $mediaPath,
                    'file_name' => $mediaName,
                ]);

                $mediaIds[] = $mediaRecord->id;
            }

            // Attach media to the galeri
            $galeri->media()->attach($mediaIds);
        }

        if ($galeri) {
            return redirect()->route('galeri.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('galeri.index')->with('error', 'Data gagal ditambahkan');
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

    public function update(GaleriRequest $request, $id)
    {
        // Validate the incoming request
        $validatedData = $request->validated();

        // Find the Galeri record
        $galeri = Galeri::find($id);

        // Handle multiple media upload
        if ($request->hasFile('filename')) {
            // Delete the old media files
            foreach ($galeri->media as $media) {
                if (file_exists(public_path($media->file_path))) {
                    unlink(public_path($media->file_path));
                }
                $media->delete();
            }

            $mediaIds = [];
            foreach ($request->file('filename') as $media) {
                $mediaName = time() . '_' . $media->getClientOriginalName();
                $media->move(public_path('media'), $mediaName);
                $mediaPath = 'media/' . $mediaName; // Store relative path

                // Create the Media record
                $mediaRecord = Media::create([
                    'file_path' => $mediaPath,
                    'file_name' => $mediaName,
                ]);

                $mediaIds[] = $mediaRecord->id;
            }

            // Attach new media to the galeri
            $galeri->media()->attach($mediaIds);
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


    // public function update(GaleriRequest $request, $id)
    // {
    //     // Validate the incoming request
    //     $validatedData = $request->validated();

    //     // Find the Galeri record
    //     $galeri = Galeri::find($id);

    //     // Handle image upload
    //     if ($request->hasFile('image')) {
    //         // Delete the old image file
    //         if (file_exists(public_path($galeri->image))) {
    //             unlink(public_path($galeri->image));
    //         }

    //         $imageName = time() . '.' . $request->image->extension();
    //         $request->image->move(public_path('images'), $imageName);
    //         $imagePath = 'images/' . $imageName;

    //         // Assign image path to validated data
    //         $validatedData['image'] = $imagePath;
    //     }

    //     // Get the website_id for the current user's desa
    //     $website = Website::where('desa_id', Auth::user()->desa_id)->first();
    //     if (!$website) {
    //         return redirect()->route('postingan.index')->with('error', 'Website tidak ditemukan untuk desa pengguna saat ini.');
    //     }
    //     $validatedData['website_id'] = $website->id;

    //     // Update the Galeri record
    //     $result = $galeri->update($validatedData);

    //     if ($result) {
    //         return redirect()->route('galeri.index')->with('success', 'Data berhasil diubah');
    //     } else {
    //         return redirect()->route('galeri.index')->with('error', 'Data gagal diubah');
    //     }
    // }

    public function updateStatus(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->update(['status' => $request->status]);

        return redirect()->route('galeri.index')->with('success', 'Status berhasil diubah');
    }

    public function destroy($id)
    {
        $galeri = Galeri::find($id);

        // Delete the media files
        foreach ($galeri->media as $media) {
            if (file_exists(public_path($media->file_path))) {
                unlink(public_path($media->file_path));
            }
            $media->delete();
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
