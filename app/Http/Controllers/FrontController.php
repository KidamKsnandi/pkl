<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Kategori;
use App\Models\Wisata;

class FrontController extends Controller
{
    public function welcome()
    {
        $kategori = Kategori::all();
        return view('welcome', compact('kategori'));
    }

    public function berandakategori(Kategori $kategori)
    {
        $katego = Kategori::all();
        $artikel = Artikel::with('user')->get();
        $wisata = Wisata::where('id_kategori', $kategori->id)->get();
        return view('front/beranda', compact('wisata', 'katego', 'artikel'));
    }

    public function beranda()
    {
        $katego = Kategori::all();
        $artikel = Artikel::with('user')->get();
        $wisata = Wisata::with('kategori')->get();
        return view('front/beranda', compact('wisata', 'katego', 'artikel'));
    }

    public function objekwisata()
    {
        $katego = Kategori::all();
        $artikel = Artikel::with('user')->get();
        $wisata = Wisata::with('kategori')->get();
        return view('front/objek-wisata', compact('wisata', 'katego', 'artikel'));
    }

    public function wisatakategori(Kategori $kategori)
    {
        $kagori = Kategori::find($kategori->id);
        $katego = Kategori::all();
        $artikel = Artikel::with('user')->get();
        $wisata = Wisata::where('id_kategori', $kategori->id)->get();
        return view('front/objek-wisata', compact('wisata', 'katego', 'artikel', 'kagori'));
    }

    public function wisatadetail(Wisata $wisata)
    {
        $wisata = Wisata::find($wisata->id);
        return view('front/detail-wisata', compact('wisata'));
    }

    public function wisatagaleri(Wisata $wisata)
    {
        $wisata = Wisata::find($wisata->id);
        $galeri = Galeri::where('id_wisata', $wisata->id)->get();
        return view('front/galeri-wisata', compact('wisata', 'galeri'));
    }

    public function artikel()
    {
        $artikel = Artikel::with('user')->get();
        return view('front/artikel', compact('artikel'));
    }

    public function artikeldetail(Artikel $artikel)
    {
        $artikel = Artikel::find($artikel->id);
        return view('front/detail-artikel', compact('artikel'));
    }

}
