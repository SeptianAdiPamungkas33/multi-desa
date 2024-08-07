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
use App\Models\Penduduk;
use Illuminate\Support\Facades\Log;
use App\Mail\SendingEmail;
use Illuminate\Support\Facades\Mail;
// use App\Mail\Email;
// use Illuminate\Support\Facades\Mail;

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
            'assignedDesaIds' => $assignedDesaIds,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        // Cek jika username sudah ada
        $user = User::where('username', $request->username)->first();
        if ($user) {
            return redirect()->route('admin-desa.index')->with('error', 'Username sudah digunakan');
        }

        // Cek jika email sudah ada
        $user = User::where('email', $request->email)->first();
        if ($user) {
            return redirect()->route('admin-desa.index')->with('error', 'Email sudah digunakan');
        }


        $validatedData = $request->validate([
            'username' => 'required',
            'urllink' => 'required',
            'nomor_telepon' => 'nullable',
            'password' => 'required',
            'email' => 'required|email|unique:users,email',
            'desa_id' => 'required',
            'nama_desa' => 'required',
            'kecamatan_id' => 'required',
        ]);

        // Pengecekan apakah desa sudah memiliki admin
        $isAdminExist = User::where('role_id', 2)->where('desa_id', $validatedData['desa_id'])->exists();
        if ($isAdminExist) {
            return redirect()->route('admin-desa.index')->with('error', 'Desa ini sudah memiliki admin');
        }

        $validatedData['role_id'] = 2;
        $validatedData['password'] = Hash::make($request->password);

        $result = User::create($validatedData);

        $website = Website::create([
            'url' => $request->urllink,
            'desa_id' => $request->desa_id,
            'user_id' => $result->id,
        ]);

        $header = Header::create([
            'title' => 'Judul Website',
            'nama_menu1' => 'Beranda',
            'nama_menu2' => 'Tentang Kami',
            'nama_menu3' => 'Layanan',
            'nama_menu4' => 'Galeri',
            'nama_menu5' => 'Artikel',
            'nama_menu6' => 'Chart',
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
            'gambar' => 'img/default.png',
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

        $penduduk = Penduduk::create([
            'laki' => 1000,
            'perempuan' => 1000,
            'total_penduduk' => 2000,
            'persen_laki' => 50.00,
            'persen_perempuan' => 50.00,
            'website_id' => $website->id,
        ]);

        if ($result) {
            $data = [
                'username' => $request->username,
                'password' => $request->password, // Password yang belum di-hash
            ];

            try {
                Mail::to($request->email)->send(new SendingEmail($data));
                return redirect()->route('admin-desa.index')->with('success', 'Data berhasil ditambahkan dan email telah dikirim.');
            } catch (\Exception $e) {
                Log::error('Failed to send email: ' . $e->getMessage());
                return redirect()->route('admin-desa.index')->with('error', 'Data berhasil ditambahkan tetapi gagal mengirim email.');
            }
        }


        // Kirim email setelah user berhasil ditambahkan
        // if ($result) {
        //     $data = [
        //         'username' => $request->username,
        //         'password' => $request->password, // Password yang belum di-hash
        //     ];

        //     // Kirim email ke user yang baru ditambahkan
        //     Mail::to($request->email)->send(new SendingEmail($data));

        //     return redirect()->route('admin-desa.index')->with('success', 'Data berhasil ditambahkan dan email telah dikirim.');
        // } else {
        //     return redirect()->route('admin-desa.index')->with('error', 'Data gagal ditambahkan');
        // }
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'username' => 'required',
    //         'urllink' => 'required',
    //         'nomor_telepon' => 'nullable',
    //         'password' => 'required',
    //         'email' => 'required|email|unique:users,email',
    //         'desa_id' => 'required',
    //         'nama_desa' => 'required',
    //         'kecamatan_id' => 'required',
    //     ]);

    //     // Pengecekan apakah desa sudah memiliki admin
    //     $isAdminExist = User::where('role_id', 2)->where('desa_id', $validatedData['desa_id'])->exists();
    //     if ($isAdminExist) {
    //         return redirect()->route('admin-desa.index')->with('error', 'Desa ini sudah memiliki admin');
    //     }

    //     $validatedData['role_id'] = 2;
    //     $validatedData['password'] = Hash::make($request->password);

    //     $result = User::create($validatedData);

    //     // Kirim email setelah user berhasil ditambahkan
    //     if ($result) {
    //         $data = [
    //             'username' => $request->username,
    //             'password' => $request->password, // Password yang belum di-hash
    //         ];

    //         // Kirim email ke user yang baru ditambahkan
    //         Mail::to($request->email)->send(new SendingEmail($data));

    //         return redirect()->route('admin-desa.index')->with('success', 'Data berhasil ditambahkan dan email telah dikirim.');
    //     } else {
    //         return redirect()->route('admin-desa.index')->with('error', 'Data gagal ditambahkan');
    //     }
    // }


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
        $user = User::find($id);
        $desa = Desa::all();

        // Ambil semua desa yang belum dipilih oleh admin, atau desa yang dipilih oleh admin saat ini
        $assignedDesaIds = User::where('role_id', 2)->where('id', '!=', $id)->pluck('desa_id')->toArray();
        $desa = Desa::whereNotIn('id', $assignedDesaIds)->get();

        return view('admindesa.edit', [
            'title' => 'Edit Desa',
            'user' => $user,
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
            'urllink' => 'required',
            'password' => 'nullable',
            'nomor_telepon' => 'nullable',
            'email' => 'required|email',
        ]);

        // dd($validatedData);

        $user = User::find($id);
        $user->username = $request->username;
        $user->nomor_telepon = $request->nomor_telepon;
        $user->email = $request->email;

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

                // Hapus Konten terkait terkait
                $website->postingan()->delete();
                $website->kategoris()->delete();
                $website->galeris()->delete();

                // Hapus header, footer, slider, tentangkami, dan layanans terkait
                $website->header()->delete();
                $website->footer()->delete();
                $website->slider()->delete();
                $website->tentangkami()->delete();
                $website->layanan()->delete();

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
