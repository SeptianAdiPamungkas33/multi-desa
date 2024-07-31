<?php

use App\Http\Controllers\TentangKamiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDesaController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\EditorPenulisController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UploadKontenController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\PendudukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Semua
Route::get('/', [LoginController::class, 'index']);

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'prosesLogin'])->name('prosesLogin');
Route::get('home-super', [LoginController::class, 'homesuper'])->name('homesuper')->middleware('auth');
Route::get('home-desa', [LoginController::class, 'homedesa'])->name('homedesa')->middleware('auth');
Route::get('home-penulis', [LoginController::class, 'homepenulis'])->name('homepenulis')->middleware('auth');
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

//Super Admin
Route::resource('admin-desa', AdminDesaController::class)->except(['show'])->middleware('auth');
// Route::resource('desa', DesaController::class)->except(['show'])->middleware('auth');

//Admin Desa
Route::resource('editor-penulis', EditorPenulisController::class)->except(['show'])->middleware('auth');
Route::resource('website', WebsiteController::class)->except(['show'])->middleware('auth');
Route::get('website-list', [WebsiteController::class, 'websitelist']);
Route::resource('website/header', HeaderController::class)->except(['show'])->middleware('auth');
Route::resource('website/footer', FooterController::class)->except(['show'])->middleware('auth');
Route::resource('website/slider', SliderController::class)->except(['show'])->middleware('auth');

Route::resource('website/tentangkami', TentangKamiController::class)->except(['show'])->middleware('auth');
Route::resource('website/layanan', LayananController::class)->except(['show'])->middleware('auth');


//Penulis
Route::resource('galeri', GaleriController::class)->except(['show'])->middleware('auth');
Route::put('/galeri/{id}/update-status', [GaleriController::class, 'updateStatus'])->name('galeri.updateStatus');

Route::resource('kategori', KategoriController::class)->except(['show'])->middleware('auth');
Route::resource('postingan', PostinganController::class)->except(['show'])->middleware('auth');
Route::put('/postingan/{id}/update-status', [PostinganController::class, 'updateStatus'])->name('postingan.updateStatus');

// Route::resource('grafik', GrafikController::class)->except(['show'])->middleware('auth');
Route::resource('penduduk', PendudukController::class)->except(['show'])->middleware('auth');
// Route::get('grafik/{id}/edit', [GrafikController::class, 'edit'])->name('grafik.edit');
// Route::put('grafik/{id}', [GrafikController::class, 'update'])->name('grafik.update');

//Frontend
Route::get('{website:url}/{menu}', function ($url, $menu) {
    // Dapatkan objek website berdasarkan URL
    $website = App\Models\Website::where('url', $url)->firstOrFail();

    // Cek menu dan arahkan ke controller yang sesuai
    switch ($menu) {
        case $website->header->nama_menu1:
            return app(FrontController::class)->beranda($url);
        case $website->header->nama_menu2:
            return app(FrontController::class)->tentangkami($url);
        case $website->header->nama_menu3:
            return app(FrontController::class)->layanan($url);
        case $website->header->nama_menu4:
            return app(FrontController::class)->galeri($url);
        case $website->header->nama_menu5:
            return app(FrontController::class)->artikel($url);
        default:
            abort(404);
    }
});

Route::get('{website:url}/{menu}/{id}', [FrontController::class, 'detailartikel']);

// Route::get('surat', [FrontController::class, 'surat']);

Route::get('some/error/route', function () {
    return view('errors.custom')->with('message', session('error'));
})->name('some.error.route');


//Route Menu
// Route::get('{website:url}/{header:nama_menu2}', [FrontController::class, 'tentangkami']);
// Route::get('{website:url}/beranda', [FrontController::class, 'beranda']);
// Route::get('{website:url}/tentang-kami', [FrontController::class, 'tentangkami']);
// Route::get('{website:url}/layanan', [FrontController::class, 'layanan']);
// Route::get('{website:url}/galeri', [FrontController::class, 'galeri']);
// Route::get('{website:url}/galeri/{id}', [FrontController::class, 'detailgaleri']);
// Route::get('{website:url}/artikel', [FrontController::class, 'artikel']);
// Route::get('{website:url}/artikel/{id}', [FrontController::class, 'detailartikel']);

// Route::get('{website:url}/{nama_menu1}', [FrontController::class, 'beranda']);
// Route::get('{website:url}/{nama_menu2}', [FrontController::class, 'tentangkami']);
// Route::get('{website:url}/{nama_menu3}', [FrontController::class, 'layanan']);
// Route::get('{website:url}/{nama_menu4}', [FrontController::class, 'galeri']);
// Route::get('{website:url}/galeri/{id}', [FrontController::class, 'detailgaleri']);
// Route::get('{website:url}/{nama_menu5}', [FrontController::class, 'artikel']);
// Route::get('{website:url}/artikel/{id}', [FrontController::class, 'detailartikel']);
