<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\Tentangkami;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    public function index()
    {
        $website = Website::where('user_id', auth()->user()->id)->first();
        // $website = Website::first();

        return view('website.edit', [
            'title' => 'Edit Website',
            'website' => $website,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
        ]);

        $website = Website::find($id);
        $website->update($validatedData);

        return redirect()->route('website.edit')->with('success', 'Data berhasil diubah');
    }
}
