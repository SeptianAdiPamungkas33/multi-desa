<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Desa;
use App\Models\Galeri;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class EditorPenulisController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $editorpenulis = User::where('role_id', 4)
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

        $user = User::where('username', $request->username)->first();

        if ($user) {
            return redirect()->route('editor-penulis.index')->with('error', 'Username sudah digunakan');
        } else {
            $user = User::where('email', $request->email)->first();

            if ($user) {
                return redirect()->route('editor-penulis.index')->with('error', 'Email sudah digunakan');
            }
        }

        $validatedData = $request->validate([
            'username' => 'required',
            'nomor_telepon' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $result = User::create([
            'username' => $request->username,
            'nomor_telepon' => $request->nomor_telepon,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'role_id' => $request->role_id,
            'desa_id' => auth()->user()->desa_id,
        ]);

        if ($result) {
            return redirect()->route('editor-penulis.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('editor-penulis.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        $desa = Desa::all();
        $role = Role::all();

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
            'desa_id' => 'required|exists:desas,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::find($id);
        $user->username = $request->username;
        $user->nomor_telepon = $request->nomor_telepon;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->desa_id = $request->desa_id;
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
