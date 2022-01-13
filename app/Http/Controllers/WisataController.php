<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Wisata;
use Str;
use Session;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisata = Wisata::with('kategori')->get();
        return view('admin.wisata.index', compact('wisata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.wisata.create', compact('kategori'));
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
            'nama_wisata' => 'required|unique:wisatas',
            'id_kategori' => 'required',
            'lokasi' => 'required',
            'deskripsi_wisata' => 'required|min:100',
            'harga_tiket' => 'required',
            'cover' => 'required|image|max:2048',
        ]);

        $wisata = new Wisata();
        $wisata->nama_wisata = $request->nama_wisata;
        $slug = Str::slug($wisata->nama_wisata);
        $wisata->slug = $slug;
        $wisata->id_kategori = $request->id_kategori;
        $wisata->lokasi = $request->lokasi;
        $wisata->deskripsi_wisata = $request->deskripsi_wisata;
        if($request->harga_tiket ==  "0") {
            $wisata->harga_tiket = "Gratis";
        } else {
        $wisata->harga_tiket = $request->harga_tiket;
        }
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('front/images/cover/', $name);
            $wisata->cover = $name;
        }
        $wisata->status = $request->status;
        $wisata->save();
        Session::flash("flash_notification", [
                        "level"=>"success",
                        "message"=>"Berhasil Menyimpan $wisata->nama_wisata"
                        ]);
        return redirect()->route('wisata.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show(Wisata $wisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wisata = Wisata::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.wisata.edit', compact('wisata', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_wisata' => 'required',
            'id_kategori' => 'required',
            'lokasi' => 'required',
            'deskripsi_wisata' => 'required|min:100',
            'harga_tiket' => 'required|alpha_num|max:10',
        ]);

        $wisata = Wisata::findOrFail($id);
        $wisata->nama_wisata = $request->nama_wisata;
        $slug = Str::slug($wisata->nama_wisata);
        $wisata->slug = $slug;
        $wisata->id_kategori = $request->id_kategori;
        $wisata->lokasi = $request->lokasi;
        $wisata->deskripsi_wisata = $request->deskripsi_wisata;
        if($request->harga_tiket ==  "0") {
            $wisata->harga_tiket = "Gratis";
        } else {
        $wisata->harga_tiket = $request->harga_tiket;
        }
        // upload cover
        if ($request->hasFile('cover')) {
            $wisata->deleteCover();
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('front/images/cover/', $name);
            $wisata->cover = $name;
        }
        $wisata->status = $request->status;
        $wisata->save();
        Session::flash("flash_notification", [
                        "level"=>"success",
                        "message"=>"Berhasil Menyimpan $wisata->nama_wisata"
                        ]);
        return redirect()->route('wisata.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);
        if(!Wisata::destroy($id)) { return redirect()->back(); } else {
        $wisata->deleteCover();
        Session::flash("flash_notification", [
                        "level"=>"success",
                        "message"=>"Berhasil Menghapus "
                        ]);
        return redirect()->route('wisata.index');
            }
    }
}
