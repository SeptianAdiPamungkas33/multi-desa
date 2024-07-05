<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Footer;
use App\Models\Galeri;
use App\Models\Header;
use App\Models\Postingan;
use App\Models\Website;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function beranda($url)
    {
        $website = Website::where('url', $url)->first();
        $galeri = Galeri::where('website_id', $website->id)->get();
        $postingan = Postingan::where('website_id', $website->id)->first();
        $data['header'] = Header::where('website_id', $website->id)->first();
        $data['footer'] = Footer::where('website_id', $website->id)->first();

        return view('front.beranda', [
            'title' => 'Edit Website',
            'case' => 'put',
            'website' => $website,
            'galeri' => $galeri,
            'artikel' => $postingan,
        ])->with($data);
    }

    public function tentangKami($url)
    {
        $website = Website::where('url', $url)->first();
        $data['header'] = Header::where('website_id', $website->id)->first();
        $data['footer'] = Footer::where('website_id', $website->id)->first();
        return view('front.tentang-kami', [
            'title' => 'Tentang Kami',
            'website' => $website,
        ])->with($data);
    }

    public function layanan($url)
    {
        $website = Website::where('url', $url)->first();
        $data['header'] = Header::where('website_id', $website->id)->first();
        $data['footer'] = Footer::where('website_id', $website->id)->first();
        return view('front.layanan', [
            'title' => 'Layanan',
            'website' => $website,
        ])->with($data);
    }

    public function galeri($url, $id)
    {
        $website = Website::where('url', $url)->first();
        $galeri = Galeri::where('website_id', $website->id)->where('id', $id)->first();
        $postingan = Galeri::where('website_id', $website->id)->where('id', $id)->first();

        if (!$galeri) {
            abort(404, 'Galeri not found');
        }

        $data['header'] = Header::where('website_id', $website->id)->first();
        $data['footer'] = Footer::where('website_id', $website->id)->first();

        return view('front.galeri', [
            'title' => 'Galeri',
            'website' => $website,
            'galeri' => $galeri,
            'postingan' => $postingan,
        ])->with($data);
    }

    public function artikel($url, $id)
    {
        $website = Website::where('url', $url)->first();
        $postingan = Postingan::where('website_id', $website->id)->where('id', $id)->first();
        $galeri = Postingan::where('website_id', $website->id)->where('id', $id)->first();

        if (!$postingan) {
            abort(404, 'Postingan not found');
        }

        $data['header'] = Header::where('website_id', $website->id)->first();
        $data['footer'] = Footer::where('website_id', $website->id)->first();

        return view('front.artikel', [
            'title' => 'Artikel',
            'website' => $website,
            'postingan' => $postingan,
            'galeri' => $galeri,
        ])->with($data);
    }

    public function potensi($url)
    {
        $website = Website::where('url', $url)->first();
        $data['header'] = Header::where('website_id', $website->id)->first();
        $data['footer'] = Footer::where('website_id', $website->id)->first();
        return view('front.potensi', [
            'title' => 'Potensi Desa',
            'website' => $website,
        ])->with($data);
    }
}
