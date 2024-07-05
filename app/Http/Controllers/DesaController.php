<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function index()
    {
        $desa = Desa::all();

        return view('desa.index', [
            'title' => 'Desa',
            'desa' => $desa
        ]);
    }

    public function create()
    {
        return view('desa.create', [
            'title' => 'Tambah Data Desa'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $result = Desa::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

        if ($result) {
            return redirect()->route('desa.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('desa.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $desa = Desa::find($id);

        return view('desa.edit', [
            'title' => 'Edit Data Desa',
            'desa' => $desa
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $desa = Desa::find($id);
        $desa->nama = $request->nama;
        $desa->alamat = $request->alamat;
        $desa->no_telp = $request->no_telp;

        $result = $desa->save();

        if ($result) {
            return redirect()->route('desa.index')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('desa.index')->with('error', 'Data gagal diubah');
        }
    }

    public function destroy($id)
    {
        $result = Desa::destroy($id);

        if ($result) {
            return redirect()->route('desa.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('desa.index')->with('error', 'Data gagal dihapus');
        }
    }
}
