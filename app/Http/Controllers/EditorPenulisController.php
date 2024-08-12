<?php

namespace App\Http\Controllers;

use App\Mail\SendingEmail;
use App\Models\Artikel;
use App\Models\Desa;
use App\Models\Galeri;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EditorPenulisController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $editorpenulis = User::where('role_id', 3)
            ->where('desa_id', $user->desa_id)
            ->get();

        return view('editor-penulis.index', [
            'title' => 'Desa',
            'editorpenulis' => $editorpenulis
        ]);
    }

    public function create()
    {
        $role = Role::all();
        $desa = Desa::all();

        return view('editor-penulis.create', [
            'title' => 'Tambah Desa',
            'case' => 'post',
            'desa' => $desa,
            'role' => $role,
        ]);
    }

    public function store(Request $request)
    {
        // Cek jika username sudah ada
        $user = User::where('username', $request->username)->first();
        if ($user) {
            return redirect()->route('editor-penulis.index')->with('error', 'Username sudah digunakan');
        }

        // Cek jika email sudah ada
        $user = User::where('email', $request->email)->first();
        if ($user) {
            return redirect()->route('editor-penulis.index')->with('error', 'Email sudah digunakan');
        }

        $validatedData = $request->validate([
            'username' => 'required',
            'nomor_telepon' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $validatedData['role_id'] = $request->role_id;
        $validatedData['desa_id'] = auth()->user()->desa_id;
        $validatedData['password'] = Hash::make($request->password);

        try {
            // Buat user baru
            $result = User::create($validatedData);

            // Kirim email jika user berhasil dibuat
            if ($result) {
                $data = [
                    'username' => $request->username,
                    'password' => $request->password, // Password yang belum di-hash
                ];

                try {
                    Mail::to($request->email)->send(new SendingEmail($data));
                    return redirect()->route('editor-penulis.index')->with('success', 'Data berhasil ditambahkan dan email telah dikirim.');
                } catch (\Exception $e) {
                    Log::error('Failed to send email: ' . $e->getMessage());
                    return redirect()->route('editor-penulis.index')->with('success', 'Data berhasil ditambahkan tetapi gagal mengirim email.');
                }
            }
        } catch (\Exception $e) {
            // Tangani error jika terjadi
            Log::error('Failed to create penulis: ' . $e->getMessage());
            return redirect()->route('editor-penulis.index')->with('error', 'Data gagal ditambahkan: ' . $e->getMessage());
        }
    }


    public function edit(string $id)
    {
        $user = User::find($id);
        $desa = Desa::all();
        $role = Role::all();

        // Ambil semua desa yang belum dipilih oleh admin, atau desa yang dipilih oleh admin saat ini
        $assignedDesaIds = User::where('role_id', 2)->where('id', '!=', $id)->pluck('desa_id')->toArray();
        $desa = Desa::whereNotIn('id', $assignedDesaIds)->get();

        return view('editor-penulis.edit', [
            'title' => 'Edit Desa',
            'user' => $user,
            'desa' => $desa,
            'role' => $role,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required',
            // 'desa_id' => 'required|exists:desas,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        // Ambil semua desa yang belum dipilih oleh admin, atau desa yang dipilih oleh admin saat ini
        $assignedDesaIds = User::where('role_id', 2)->where('id', '!=', $id)->pluck('desa_id')->toArray();
        $desa = Desa::whereNotIn('id', $assignedDesaIds)->get();

        $user = User::find($id);
        $user->username = $request->username;
        $user->nomor_telepon = $request->nomor_telepon;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->desa_id = $request->user()->desa_id;
        $user->role_id = $request->role_id;



        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user->password = Hash::make($request->password);
        }

        $result = $user->save();

        if ($result) {
            return redirect()->route('editor-penulis.index')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('editor-penulis.index')->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = User::destroy($id);

        if ($result) {
            return redirect()->route('editor-penulis.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('editor-penulis.index')->with('error', 'Data gagal dihapus');
        }
    }
}
