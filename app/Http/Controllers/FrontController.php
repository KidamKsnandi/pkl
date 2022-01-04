<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function welcome() {
        $kategori = Kategori::all();
        return view('welcome', compact('kategori'));
    }

    public function berandakategori(Kategori $kategori) {
        $katego = Kategori::all();
        $wisata = Wisata::where('id_kategori', $kategori->id)->get();
        return view('front/beranda', compact('wisata', 'katego'));
    }

    public function beranda() {
        $katego = Kategori::all();
        $wisata = Wisata::with('kategori')->get();
        return view('front/beranda', compact('wisata', 'katego'));
    }

    public function objekwisata() {
        $katego = Kategori::all();
        $wisata = Wisata::with('kategori')->get();
        return view('front/objek-wisata', compact('wisata', 'katego'));
    }

    public function wisatakategori(Kategori $kategori) {
        $katego = Kategori::all();
        $wisata = Wisata::where('id_kategori', $kategori->id)->get();
        return view('front/objek-wisata', compact('wisata', 'katego'));
    }

    public function wisatadetail(Wisata $wisata) {
        $wisata = Wisata::find($wisata->id);
        return view('front/detail-wisata', compact('wisata'));
    }

    public function wisatagaleri(Wisata $wisata) {
        $wisata = Wisata::find($wisata->id);
        $galeri = Galeri::where('id_wisata', $wisata->id)->get();
        return view('front/galeri-wisata', compact('wisata','galeri'));
    }

}
