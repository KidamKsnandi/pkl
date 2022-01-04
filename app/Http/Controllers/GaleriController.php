<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kategori;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Session;

class GaleriController extends Controller
{
    public function all()
    {
        $galeri = Galeri::with('wisata')->latest()->get();
        return view('admin.galeri.all', compact('galeri'));
    }


    public function index(Wisata $wisata)
    {
        $wisata = Wisata::find($wisata->id);
        $galeri = Galeri::where('id_wisata', $wisata->id)->get();
        return view('admin.galeri.index', compact('wisata','galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Wisata $wisata)
    {
        $wisata = Wisata::find($wisata->id);
        return view('admin.galeri.create', compact('wisata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Wisata $wisata)
    {
        $validated = $request->validate([
            'gambar' => 'required|image|max:2048',
        ]);

        $galeri = new Galeri();
        $galeri->id_wisata = $wisata->id;
        // upload cover
        // // Mengambil file yang diupload
        // $uploaded_cover = $request->file('gambar');
        // // mengambil extension file
        // $extension = $uploaded_cover->getClientOriginalExtension();
        // // membuat nama file random berikut extension
        // $filename = time() . '.' . $extension;
        // // menyimpan cover ke folder public/img
        // $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'front/images/galeri/';
        // $uploaded_cover->move($destinationPath, $filename);
        // // mengisi field cover di book dengan filename yang baru dibuat
        // $galeri->gambar = $filename;
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('front/images/galeri/', $name);
            $galeri->gambar = $name;
        }
        $galeri->save();
        Session::flash("flash_notification", [
                        "level"=>"success",
                        "message"=>"Berhasil Menyimpan Gambar di Galeri"
                        ]);
        return redirect('admin/galeri');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Wisata $wisata, $id)
    {
        $wisata = Wisata::find($wisata->id);
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.show', compact('wisata', 'galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Wisata $wisata, $id)
    {
        $wisata = Wisata::find($wisata->id);
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('wisata', 'galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wisata $wisata, $id )
    {
        $validated = $request->validate([
            'gambar' => 'required',
        ]);

        $galeri = Galeri::findOrFail($id);
        $galeri->id_wisata = $wisata->id;
        // upload cover
        if ($request->hasFile('gambar')) {
            $galeri->deleteGaleri();
            $image = $request->file('gambar');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('front/images/galeri/', $name);
            $galeri->gambar = $name;
        }
        $galeri->save();
        Session::flash("flash_notification", [
                        "level"=>"success",
                        "message"=>"Berhasil Menyimpan Gambar di Galeri"
                        ]);
        return redirect('admin/galeri');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->delete();
        $galeri->deleteGaleri();
        Session::flash("flash_notification", [
                        "level"=>"success",
                        "message"=>"Berhasil Menghapus Gambar di Galeri"
                        ]);
        return redirect('admin/galeri');
    }
}
