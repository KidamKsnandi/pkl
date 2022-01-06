<?php

use App\Models\Galeri;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ArtikelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes([
    'register' => false
]);

Route::get('/home', function () {
    return view('home');
});

Route::get('/logout', [Auth\LoginController::class, 'logout']);

// Route Pengunjung
Route::get('/', [FrontController::class, 'welcome']);
Route::get('beranda/{kategori:slug}', [FrontController::class, 'berandakategori']);
Route::get('beranda/', [FrontController::class, 'beranda']);
Route::get('objek-wisata/', [FrontController::class, 'objekwisata']);
Route::get('objek-wisata/{kategori:slug}', [FrontController::class, 'wisatakategori']);
Route::get('{wisata:slug}/detail', [FrontController::class, 'wisatadetail']);
Route::get('{wisata:slug}/galeriwisata', [FrontController::class, 'wisatagaleri']);
Route::get('artikel/', [FrontController::class, 'artikel']);
Route::get('{artikel:slug}/selengkapnya', [FrontController::class, 'artikeldetail']);

// Route Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function() {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('{id}/profile', [UserController::class, 'profile']);
    Route::resource('kategori', KategoriController::class);
    Route::resource('wisata', WisataController::class);
    Route::resource('user', UserController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::get('galeri', [GaleriController::class, 'all']);
    Route::get('{wisata:slug}/galeri', [GaleriController::class, 'index']);
    Route::get('{wisata:slug}/galeri/create', [GaleriController::class, 'create']);
    Route::post('{wisata:slug}/galeri/store', [GaleriController::class, 'store']);
    Route::get('{wisata:slug}/galeri/edit/{id}', [GaleriController::class, 'edit']);
    Route::get('{wisata:slug}/galeri/show/{id}', [GaleriController::class, 'show']);
    Route::post('{wisata:slug}/galeri/edit/{id}/update', [GaleriController::class, 'update']);
    Route::post('{wisata:slug}/galeri/delete/{id}', [GaleriController::class, 'destroy']);
});

