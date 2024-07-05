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
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UploadKontenController;
use App\Http\Controllers\WebsiteController;

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

Route::get('/', [LoginController::class, 'index']);

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'prosesLogin'])->name('prosesLogin');
Route::get('home', [LoginController::class, 'home'])->name('home')->middleware('auth');
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::resource('admin-desa', AdminDesaController::class)->except(['show'])->middleware('auth');
Route::resource('desa', DesaController::class)->except(['show'])->middleware('auth');
Route::resource('editor-penulis', EditorPenulisController::class)->except(['show'])->middleware('auth');
Route::resource('kategori', KategoriController::class)->except(['show'])->middleware('auth');
Route::resource('postingan', PostinganController::class)->except(['show'])->middleware('auth');

Route::resource('upload-konten', UploadKontenController::class)->except(['show'])->middleware('auth');

Route::resource('website', WebsiteController::class)->except(['show'])->middleware('auth');
Route::resource('website/header', HeaderController::class)->except(['show'])->middleware('auth');
Route::resource('website/footer', FooterController::class)->except(['show'])->middleware('auth');
Route::resource('website/slider', SliderController::class)->except(['show'])->middleware('auth');

Route::resource('website/tentangkami', TentangKamiController::class)->except(['show'])->middleware('auth');
Route::resource('website/layanan', LayananController::class)->except(['show'])->middleware('auth');

Route::resource('konten', KontenController::class)->except(['show'])->middleware('auth');
Route::resource('galeri', GaleriController::class)->except(['show'])->middleware('auth');
Route::resource('konten/artikel', ArtikelController::class)->except(['show'])->middleware('auth');
// Route::resource('website/layanan', LayananController::class)->except(['show'])->middleware('auth');



Route::get('profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');

Route::get('{website:url}/beranda', [FrontController::class, 'beranda']);
Route::get('{website:url}/tentang-kami', [FrontController::class, 'tentangkami']);
Route::get('{website:url}/layanan', [FrontController::class, 'layanan']);
Route::get('{website:url}/galeri/{id}', [FrontController::class, 'galeri']);
Route::get('{website:url}/artikel/{id}', [FrontController::class, 'artikel']);
Route::get('{website:url}/potensi', [FrontController::class, 'potensi']);


Route::get('some/error/route', function () {
    return view('errors.custom')->with('message', session('error'));
})->name('some.error.route');
