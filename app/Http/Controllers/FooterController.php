<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Website;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        // $footer = Footer::find($id);
        // $website = Website::all();

        $website = Website::where('user_id', auth()->user()->id)->first();
        $footer = Footer::where('website_id', $website->id)->first();

        return view('footer.edit', [
            'title' => 'Edit Data Footer',
            'footer' => $footer,
            'website' => $website
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'alamat' => 'required',
            'sosmed' => 'required',
            'email' => 'required',
            'no_telepon' => 'required',
            'jadwal1' => 'required',
            'jadwal2' => 'required',
            'jadwal3' => 'required',
            'link_terkait1' => 'required',
            'link_terkait2' => 'required',
            'link_terkait3' => 'required',
            'link_url1' => 'required',
            'link_url2' => 'required',
            'link_url3' => 'required',
            'navbar_color' => 'required',
        ]);

        $footer = Footer::find($id);
        $footer->alamat = $request->alamat;
        $footer->sosmed = $request->sosmed;
        $footer->email = $request->email;
        $footer->no_telepon = $request->no_telepon;
        $footer->jadwal1 = $request->jadwal1;
        $footer->jadwal2 = $request->jadwal2;
        $footer->jadwal3 = $request->jadwal3;
        $footer->link_terkait1 = $request->link_terkait1;
        $footer->link_terkait2 = $request->link_terkait2;
        $footer->link_terkait3 = $request->link_terkait3;
        $footer->link_url1 = $request->link_url1;
        $footer->link_url2 = $request->link_url2;
        $footer->link_url3 = $request->link_url3;
        $footer->navbar_color = $request->navbar_color;

        $result = $footer->save();

        if ($result) {
            return redirect()->route('website.index')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('website.index')->with('error', 'Data gagal diubah');
        }
    }

    public function destroy($id)
    {
        $footer = Footer::find($id);
        $footer->delete();

        return redirect()->route('footer.index')->with('success', 'Data berhasil dihapus');
    }
}
