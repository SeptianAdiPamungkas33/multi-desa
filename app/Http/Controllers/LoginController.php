<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Desa;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
// use App\Models\Artikel;
use App\Models\kategori;
use App\Models\Postingan;
use App\Models\Galeri;

class LoginController extends Controller
{
    // public function index()
    // {
    //     if (Auth::check()) {
    //         return redirect('home');
    //     } else {
    //         return view('auth.login', [
    //             'title' => 'Login'
    //         ]);
    //     }

    //     if (!auth()->check() || auth()->user()->role_id != 1) {
    //         abort(403);
    //     }
    // }

    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            switch ($user->role_id) {
                case 1: // Assuming 1 is the role_id for superadmin
                    return redirect()->route('homesuper');
                case 2: // Assuming 2 is the role_id for admin desa
                    return redirect()->route('homedesa');
                case 3: // Assuming 3 is the role_id for penulis
                    return redirect()->route('homepenulis');
                default:
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Role tidak valid');
            }
        } else {
            return view('auth.login', [
                'title' => 'Login'
            ]);
        }

        if (!auth()->check() || auth()->user()->role_id != 1) {
            abort(403);
        }
    }


    // public function prosesLogin(Request $request)
    // {
    //     // dd($request->all());

    //     $data = [
    //         'username' => $request->input('username'),
    //         'password' => $request->input('password')
    //     ];

    //     $data = $request->validate([
    //         'username' => ['required'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt($data)) {
    //         return redirect('home');
    //     } else {
    //         Session::flash('error', 'Username atau Password Salah');
    //         return redirect('login');
    //     }
    // }

    public function prosesLogin(Request $request)
    {
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($data)) {
            $user = Auth::user();

            switch ($user->role_id) {
                case 1: // role_id 1 for superadmin
                    return redirect()->route('homesuper');
                case 2: // role_id 2 for admin desa
                    return redirect()->route('homedesa');
                case 4: // role_id 4 for penulis
                    return redirect()->route('homepenulis');
                default:
                    Auth::logout();
                    Session::flash('error', 'Role tidak valid');
                    return redirect()->route('login');
            }
        } else {
            Session::flash('error', 'Username atau Password Salah');
            return redirect()->route('login');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    // public function home()
    // {
    //     $desa = Desa::all();

    //     $user_id = auth()->user()->id;
    //     $website = Website::where('user_id', $user_id)->first();

    //     $totalWebsites = Website::count();
    //     $totalDesa = Desa::count();
    //     $totalAdminDesa = User::where('role_id', 2)->count();

    //     Menghitung total penulis berdasarkan desa_id terkait, // Asumsikan role_id 4 adalah penulis
    //     $totalPenulis = User::where('role_id', 4)
    //         ->where('desa_id', $website->desa_id)
    //         ->count();

    //     Menghitung total galeri berdasarkan website_id terkait
    //     $totalGaleri = Galeri::where('website_id', $website->id)
    //         ->count();

    //     Menghitung total galeri berdasarkan website_id terkait
    //     $totalArtikel = Postingan::where('website_id', $website->id)
    //         ->count();

    //     $totalGaleri = Galeri::where('website_id')->count();
    //     $totalPenulis = User::where('role_id', 4)->count();
    //     $totalKategori = Kategori::count();
    //     $totalArtikel = Postingan::count();

    //     return view('index', [
    //         'title' => 'Home',
    //         'website' => $website,
    //         'totalWebsites' => $totalWebsites,
    //         'totalDesa' => $totalDesa,

    //         'totalAdminDesa' => $totalAdminDesa,
    //         'totalPenulis' => $totalPenulis,

    //         'totalGaleri' => $totalGaleri,
    //         'totalKategori' => $totalKategori,
    //         'totalArtikel' => $totalArtikel,
    //     ]);
    // }

    public function homesuper()
    {

        $user_id = auth()->user()->id;
        $website = Website::where('user_id', $user_id)->first();
        $totalWebsites = Website::count();
        $totalDesa = Desa::count();
        $totalAdminDesa = User::where('role_id', 2)->count();

        return view('index', [
            'title' => 'Home',
            'website' => $website,
            'totalWebsites' => $totalWebsites,
            'totalDesa' => $totalDesa,
            'totalAdminDesa' => $totalAdminDesa,
        ]);
    }

    public function homedesa()
    {
        $user_id = auth()->user()->id;
        $website = Website::where('user_id', $user_id)->first();

        // Menghitung total penulis berdasarkan desa_id terkait
        $totalPenulis = User::where('role_id', 4)
            ->where('desa_id', $website->desa_id)
            ->count();

        // Menghitung total artikel atau postingan berdasarkan website_id terkait
        $totalArtikel = Postingan::where('website_id', $website->id)
            ->count();

        return view('home-desa', [
            'title' => 'Home',
            'website' => $website,
            'totalPenulis' => $totalPenulis,
            'totalArtikel' => $totalArtikel,
        ]);
    }

    public function homepenulis()
    {
        $user = auth()->user();
        $desa_id = $user->desa_id;

        $website = Website::where('desa_id', $desa_id)->first();

        // Jika tak ada website yang dimaksud, maka set totalGaleri, totalKategori, dan totalArtikel menjadi 0
        if (!$website) {
            $totalGaleri = 0;
            $totalKategori = 0;
            $totalArtikel = 0;
        } else {
            // Hitung total 
            $totalGaleri = Galeri::where('website_id', $website->id)->count();
            $totalKategori = Kategori::where('website_id', $website->id)->count();
            $totalArtikel = Postingan::where('website_id', $website->id)->count();
        }

        return view('home-penulis', [
            'title' => 'Home',
            'website' => $website,
            'totalGaleri' => $totalGaleri,
            'totalKategori' => $totalKategori,
            'totalArtikel' => $totalArtikel,
        ]);
    }
}
