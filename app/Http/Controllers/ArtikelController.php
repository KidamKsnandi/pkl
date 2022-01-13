<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Str;
use Session;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::with('user')->get();
        return view('author.artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:artikels',
            'cover' => 'required|image|max:2048',
            'konten' => 'required|min:200',
        ]);

        $artikel = new Artikel();
        $artikel->id_user = Auth::user()->id;
        $artikel->judul = $request->judul;
        $slug = Str::slug($artikel->judul);
        $artikel->slug = $slug;
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('front/images/cover/', $name);
            $artikel->cover = $name;
        }
        $artikel->konten = $request->konten;
        $artikel->slider = "Tidak";
        $artikel->save();
        Session::flash("flash_notification", [
                        "level"=>"success",
                        "message"=>"Berhasil Menyimpan $artikel->nama_artikel"
                        ]);
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('author.artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        if(Auth::user()->id == "1" || $artikel->id_user == Auth::user()->id) {
            return view('author.artikel.edit', compact('artikel'));
        } else {
        Session::flash("flash_notification", [
                        "level"=>"danger",
                        "message"=>"Artikel Ini bukan milik anda"
                        ]);
        return redirect()->route('artikel.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required|min:200',
        ]);

        $artikel = Artikel::findOrFail($id);
        $artikel->id_user = Auth::user()->id;
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
        $artikel->slider = "Tidak";
        $artikel->save();
        Session::flash("flash_notification", [
                        "level"=>"success",
                        "message"=>"Berhasil Menyimpan $artikel->nama_artikel"
                        ]);
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        if(Auth::user()->id == "1" || $artikel->id_user == Auth::user()->id) {
        $artikel->delete();
        $artikel->deleteCover();
        Session::flash("flash_notification", [
                        "level"=>"success",
                        "message"=>"Berhasil Menghapus Artikel"
                        ]);
        return redirect()->route('artikel.index');
        } else {
        Session::flash("flash_notification", [
                        "level"=>"danger",
                        "message"=>"Artikel Ini bukan milik anda"
                        ]);
        return redirect()->route('artikel.index');
        }
    }
}
