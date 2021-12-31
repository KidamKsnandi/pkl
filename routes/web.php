<?php

use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\WisataController;
use App\Models\Galeri;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/coba', function () {
    return view('beranda');
});

Auth::routes([
    'register' => false
]);

Route::get('/home', function() {
    return view('home');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function() {
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('kategori', KategoriController::class);
    Route::resource('wisata', WisataController::class);
    Route::get('galeri', [GaleriController::class, 'all']);
    Route::get('{wisata:slug}/galeri', [GaleriController::class, 'index']);
    Route::get('{wisata:slug}/galeri/create', [GaleriController::class, 'create']);
    Route::post('{wisata:slug}/galeri/store', [GaleriController::class, 'store']);
    Route::get('{wisata:slug}/galeri/edit/{id}', [GaleriController::class, 'edit']);
    Route::get('{wisata:slug}/galeri/show/{id}', [GaleriController::class, 'show']);
    Route::post('{wisata:slug}/galeri/edit/{id}/update', [GaleriController::class, 'update']);
    Route::post('{wisata:slug}/galeri/delete/{id}', [GaleriController::class, 'destroy']);
});

