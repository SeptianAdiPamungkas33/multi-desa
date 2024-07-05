<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Header;
use App\Models\Website;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index($url)
    {
        $website = Website::where('url', $url)->first();
        $data['header'] = Header::where('website_id', $website->id)->first();
        $data['footer'] = Footer::where('website_id', $website->id)->first();
        return view('front.artikel', [
            'title' => 'Artikel',
            'website' => $website,
        ])->with($data);
    }
}
