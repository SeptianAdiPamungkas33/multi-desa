<?php

namespace App\Http\Controllers;

use App\Charts\PendudukChart;
use App\Models\Artikel;
use App\Models\Footer;
use App\Models\Galeri;
use App\Models\Header;
use App\Models\Layanan;
use App\Models\Penduduk;
use App\Models\Postingan;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function beranda($url)
    {
        $website = Website::where('url', $url)->first();
        $galeri = Galeri::where('website_id', $website->id)->get();
        $layanan = Layanan::where('website_id', $website->id)->first();
        $postingans = Postingan::where('website_id', $website->id)->get();
        $data['header'] = Header::where('website_id', $website->id)->first();
        $data['footer'] = Footer::where('website_id', $website->id)->first();

        return view('front.beranda', [
            'title' => 'Edit Website',
            'case' => 'put',
            'website' => $website,
            'galeri' => $galeri,
            'layanan' => $layanan,
            'artikels' => $postingans,

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

    public function galeri($url)
    {
        $website = Website::where('url', $url)->firstOrFail();
        $header = Header::where('website_id', $website->id)->first();
        $footer = Footer::where('website_id', $website->id)->first();

        return view('front.galeri', [
            'title' => 'Galeri',
            'website' => $website,
            'header' => $header,
            'footer' => $footer,
        ]);
    }

    public function detailgaleri($url, $id)
    {
        $website = Website::where('url', $url)->firstOrFail();
        $galeri = Galeri::where('website_id', $website->id)->where('id', $id)->firstOrFail();
        $header = Header::where('website_id', $website->id)->first();
        $footer = Footer::where('website_id', $website->id)->first();

        return view('front.galeri-detail', [
            'title' => 'Detail Galeri',
            'website' => $website,
            'galeri' => $galeri,
            'header' => $header,
            'footer' => $footer,
        ]);
    }


    public function artikel($url)
    {
        $website = Website::where('url', $url)->first();
        $data['header'] = Header::where('website_id', $website->id)->first();
        $data['footer'] = Footer::where('website_id', $website->id)->first();


        return view('front.artikel', [
            'title' => 'Artikel',
            'website' => $website,
        ])->with($data);
    }

    public function detailartikel($url, $menu, $id)
    {
        // dd($url, $menu, $id);
        $website = Website::where('url', $url)->first();
        $artikel = Artikel::where('website_id', $website->id)->where('id', $id)->first();

        $data['header'] = Header::where('website_id', $website->id)->first();
        $data['footer'] = Footer::where('website_id', $website->id)->first();

        return view('front.artikel-detail', [
            'title' => 'Artikel',
            'website' => $website,
            'artikel' => $artikel,
        ])->with($data);
    }

    public function chart(PendudukChart $chart, $url)
    {
        // Ambil website berdasarkan URL
        $website = Website::where('url', $url)->first();

        // Pastikan website ditemukan
        if (!$website) {
            abort(404, 'Website not found');
        }

        // Ambil semua data penduduk terkait dengan website
        $pendudukCollection = Penduduk::where('website_id', $website->id)->get();

        // Hitung total penduduk
        $totalLaki = $pendudukCollection->sum('laki');
        $totalPerempuan = $pendudukCollection->sum('perempuan');
        $totalPenduduk = $totalLaki + $totalPerempuan;
        $persenLaki = $totalPenduduk ? ($totalLaki / $totalPenduduk) * 100 : 0;
        $persenPerempuan = $totalPenduduk ? ($totalPerempuan / $totalPenduduk) * 100 : 0;

        // Ambil header dan footer
        $data['header'] = Header::where('website_id', $website->id)->first();
        $data['footer'] = Footer::where('website_id', $website->id)->first();

        return view('front.chart', [
            'chart' => $chart->build($website->id), // Pass the website_id here
            'title' => 'Chart',
            'website' => $website,
            'penduduk' => $pendudukCollection,
            'totalLaki' => $totalLaki,
            'totalPerempuan' => $totalPerempuan,
            'totalPenduduk' => $totalPenduduk,
            'persenLaki' => $persenLaki,
            'persenPerempuan' => $persenPerempuan,
        ])->with($data);
    }


    // public function detailchart(PendudukChart $chart, $url, $id)
    // {
    //     // Ambil website berdasarkan URL
    //     $website = Website::where('url', $url)->first();
    //     $penduduk = Penduduk::where('website_id', $website->id)->where('id', $id)->first();

    //     // if (!$website) {
    //     //     abort(404, 'Website not found');
    //     // }

    //     // if (!$penduduk) {
    //     //     abort(404, 'Penduduk not found');
    //     // }

    //     // Ambil header dan footer
    //     $data['header'] = Header::where('website_id', $website->id)->first();
    //     $data['footer'] = Footer::where('website_id', $website->id)->first();

    //     return view('front.chart-detail', [
    //         'chart' => $chart->build(),
    //         'penduduk' => $penduduk,
    //         'website' => $website,
    //     ])->with($data);
    // }

    public function surat()
    {
        return view('front.surat', [
            'title' => 'Surat Online',
        ]);
    }
}
