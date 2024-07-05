<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeaderController extends Controller
{
    public function index()
    {
        $website = Website::where('user_id', auth()->user()->id)->first();
        $header = Header::where('website_id', $website->id)->first();

        return view('header.edit', [
            'title' => 'Edit Data Header',
            'header' => $header,
            'website' => $website
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'nama_menu1' => 'required',
            'nama_menu2' => 'required',
            'nama_menu3' => 'required',
            'nama_menu4' => 'required',
            'nama_menu5' => 'required',
            // 'nama_menu6' => 'required',
            'navbar_color' => 'required',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $header = Header::findOrFail($id);
        $header->title = $request->title;
        $header->nama_menu1 = $request->nama_menu1;
        $header->nama_menu2 = $request->nama_menu2;
        $header->nama_menu3 = $request->nama_menu3;
        $header->nama_menu4 = $request->nama_menu4;
        $header->nama_menu5 = $request->nama_menu5;
        $header->nama_menu6 = $request->nama_menu6;
        $header->navbar_color = $request->navbar_color;

        $result = $header->save();

        if ($result) {
            return redirect()->route('website.index')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('website.index')->with('error', 'Data gagal diubah');
        }
    }
}
