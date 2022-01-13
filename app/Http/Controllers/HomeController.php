<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\User;
use Str;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        $kategori = Kategori::all();
        return view('admin.index', compact('user'));
    }

    public function index2()
    {
        $user = User::all();
        $kategori = Kategori::all();
        return view('author.index', compact('user'));
    }

    public function artikel()
    {
        $artikel = Artikel::all();
        return view('admin.artikel.index', compact('artikel'));
    }

    public function lihat($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.lihat', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
         $request->validate([
            'judul' => 'required',
            'id_user' => 'required',
            'konten' => 'required|min:200',
            'slider' => 'required'
        ]);

        $artikel = Artikel::findOrFail($id);
        $artikel->id_user = $request->id_user;
        $artikel->judul = $request->judul;
        $slug = Str::slug($artikel->judul);
        $artikel->slug = $slug;
        if ($request->hasFile('cover')) {
            $artikel->deleteCover();
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('front/images/cover/', $name);
            $artikel->cover = $name;
        }
        $artikel->konten = $request->konten;
        $artikel->slider = $request->slider;
        $artikel->save();
        Session::flash("flash_notification", [
                        "level"=>"success",
                        "message"=>"Berhasil Menyimpan $artikel->nama_artikel"
                        ]);
        return redirect('admin/article');
    }

    public function destroy($id) {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();
        $artikel->deleteCover();
        Session::flash("flash_notification", [
                        "level"=>"success",
                        "message"=>"Berhasil Menghapus Artikel"
                        ]);
        return redirect('admin/article');
    }

}
