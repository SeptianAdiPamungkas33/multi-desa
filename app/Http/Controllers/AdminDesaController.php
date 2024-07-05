<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Footer;
use App\Models\Header;
use App\Models\Layanan;
use App\Models\Tentangkami;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $admindesa = User::where('role_id', 2)->get();

        return view('admindesa.index', [
            'title' => 'Desa',
            'admindesa' => $admindesa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $assignedDesaIds = User::whereNotNull('desa_id')->pluck('desa_id');
        // $desa = Desa::whereNotIn('id', $assignedDesaIds)->get();

        $assignedDesaIds = User::where('role_id', 2)->pluck('desa_id')->toArray();
        $desa = Desa::whereNotIn('id', $assignedDesaIds)->get();

        $desa = Desa::all();
        return view('admindesa.create', [
            'title' => 'Tambah Desa',
            'case' => 'post',
            'desa' => $desa,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = User::where('username', $request->username)->first();

        if ($user) {
            return redirect()->route('admin-desa.index')->with('error', 'Username sudah digunakan');
        } else {
            $user = User::where('email', $request->email)->first();

            if ($user) {
                return redirect()->route('admin-desa.index')->with('error', 'Email sudah digunakan');
            }
        }

        $validatedData = $request->validate([
            'username' => 'required',
            'nomor_telepon' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:users,email',
            'desa_id' => 'required|exists:desas,id',
        ]);

        $result = User::create([
            'username' => $request->username,
            'nomor_telepon' => $request->nomor_telepon,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'role_id' => 2,
            'desa_id' => $request->desa_id,
        ]);

        $website = Website::create([
            'url' => $request->username,
            'desa_id' => $request->desa_id,
            'user_id' => $result->id,
        ]);

        $header = Header::create([
            'title' => 'Judul Website',
            'nama_menu1' => 'Beranda',
            'nama_menu2' => 'Tentang Kami',
            'nama_menu3' => 'Layanan',
            'nama_menu4' => 'Artikel',
            'nama_menu5' => 'Galeri',
            'nama_menu6' => 'Potensi Desa',
            'image' => 'img/default.png',
            'website_id' => $website->id,
        ]);

        $footer = Footer::create([
            'alamat' => 'alamat',
            'sosmed' => 'sosmed',
            'email' => 'email',
            'no_telepon' => 'no_telepon',
            'jadwal1' => 'jadwal1',
            'jadwal2' => 'jadwal2',
            'jadwal3' => 'jadwal3',
            'link_terkait1' => 'link_terkait1',
            'link_terkait2' => 'link_terkait2',
            'link_terkait3' => 'link_terkait3',
            'link_url1' => 'link_url1',
            'link_url2' => 'link_url2',
            'link_url3' => 'link_url3',
            'navbar_color' => 'bg-blue-500',
            'website_id' => $website->id,
        ]);

        $tentangkami = Tentangkami::create([
            'judul' => 'Judul',
            'deskripsi' => 'Deskripsi',
            'gambar' => 'kantor_bupati.png',
            'website_id' => $website->id,
        ]);

        $layanan = Layanan::create([
            'judul1' => 'Judul',
            'deskripsi1' => 'Deskripsi',
            'gambar1' => 'gambar',
            'judul2' => 'Judul',
            'deskripsi2' => 'Deskripsi',
            'gambar2' => 'gambar',
            'judul3' => 'Judul',
            'deskripsi3' => 'Deskripsi',
            'gambar3' => 'gambar',
            'website_id' => $website->id,
        ]);


        if ($result) {
            return redirect()->route('admin-desa.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('admin-desa.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $user = User::find($id);
        // $desa = Desa::all();

        // Ambil semua desa yang belum dipilih oleh admin, atau desa yang dipilih oleh admin saat ini
        $assignedDesaIds = User::where('role_id', 2)->where('id', '!=', $id)->pluck('desa_id')->toArray();
        $desa = Desa::whereNotIn('id', $assignedDesaIds)->get();

        return view('admindesa.edit', [
            'title' => 'Edit Desa',
            // 'user' => $user,
            'desa' => $desa,
            'assignedDesaIds' => $assignedDesaIds,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required',
            'desa_id' => 'required|exists:desas,id',
        ]);

        $user = User::find($id);
        $user->username = $request->username;
        $user->nomor_telepon = $request->nomor_telepon;
        $user->email = $request->email;
        $user->desa_id = $request->desa_id;

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user->password = Hash::make($request->password);
        }

        $result = $user->save();

        if ($result) {
            return redirect()->route('admin-desa.index')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('admin-desa.index')->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if ($user) {
            // Hapus website terkait
            $website = $user->website;

            if ($website) {
                // Hapus artikel terkait
                $website->postingan()->delete();

                // Hapus galeris terkait
                $website->galeris()->delete();

                // Hapus header, footer, slider, tentangkami, dan layanans terkait
                $website->header()->delete();
                $website->footer()->delete();
                $website->slider()->delete();
                $website->tentangkami()->delete();
                $website->layanans()->delete();

                // Hapus website
                $website->delete();
            }

            // Hapus user
            $result = $user->delete();
        }

        if (isset($result) && $result) {
            return redirect()->route('admin-desa.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('admin-desa.index')->with('error', 'Data gagal dihapus');
        }
    }
}
