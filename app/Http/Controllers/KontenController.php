<?php

namespace App\Http\Controllers;

use App\Models\Konten;
use App\Models\Website;
use Illuminate\Http\Request;

class KontenController extends Controller
{
    public function index()
    {
        $konten = Konten::where('user_id', auth()->user()->id)->first();
        // $konten = konten::first();

        return view('penulis.index', [
            'title' => 'Edit konten',
            'case' => 'put',
            'konten' => $konten,
        ]);
    }
}
