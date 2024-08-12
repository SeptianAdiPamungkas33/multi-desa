<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Desa;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Postingan;
use App\Models\Galeri;
use App\Charts\MonthlyUserChart;


class LoginController extends Controller
{

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

    public function prosesLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:255',
                'regex:/[a-z]/',      // Mengandung setidaknya satu huruf kecil
                'regex:/[A-Z]/',      // Mengandung setidaknya satu huruf besar
                'regex:/[0-9]/',      // Mengandung setidaknya satu angka
                'regex:/[@$!%*#?&]/'  // Mengandung setidaknya satu karakter spesial
            ]
        ], [
            'username.required' => 'Username harus diisi.',
            'username.string' => 'Username tidak valid.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password harus minimal 8 karakter.',
            'password.max' => 'Password tidak boleh lebih dari 255 karakter.',
            'password.regex' => 'Password harus mengandung setidaknya satu huruf besar, satu huruf kecil, satu angka, dan satu karakter spesial (@, $, !, %, *, #, ?, &).'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check if the username exists
            $user = User::where('username', $credentials['username'])->first();
            if (!$user) {
                return back()->withErrors([
                    'username' => 'Username tidak valid.',
                ])->onlyInput('username');
            }

            switch ($user->role_id) {
                case 1: // role_id 1 for superadmin
                    return redirect()->route('homesuper');
                case 2: // role_id 2 for admin desa
                    return redirect()->route('homedesa');
                case 3: // role_id 3 for penulis
                    return redirect()->route('homepenulis');
                default:
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Role tidak valid');
            }
        } else {
            return back()->withErrors([
                'loginError' => 'Username atau password salah.',
            ])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function homesuper(MonthlyUserChart $chart, Request $request)
    {
        $user_id = auth()->user()->id;
        $website = Website::where('user_id', $user_id)->first();
        $totalWebsites = Website::count();
        $totalDesa = Desa::count();
        $totalAdminDesa = User::where('role_id', 2)->count();

        // Get the selected year from the request or default to the current year
        $year = $request->input('year', now()->year);

        return view('index', [
            'chart' => $chart->build($year),
            'title' => 'Home',
            'website' => $website,
            'totalWebsites' => $totalWebsites,
            'totalDesa' => $totalDesa,
            'totalAdminDesa' => $totalAdminDesa,
            'selectedYear' => $year,
            'availableYears' => range(now()->year - 5, now()->year), // Example range of years
        ]);
    }



    public function homedesa()
    {
        $user_id = auth()->user()->id;
        $website = Website::where('user_id', $user_id)->first();

        // Menghitung total penulis berdasarkan desa_id terkait
        $totalPenulis = User::where('role_id', 3)
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
