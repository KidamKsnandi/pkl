<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Wisata extends Model
{
    use HasFactory;

    protected $visible = ['id_kategori','nama_wisata','slug', 'lokasi', 'deskripsi_wisata',
                            'harga_tiket', 'cover', 'status'];
    protected $fillable = ['id_kategori','nama_wisata','slug', 'lokasi', 'deskripsi_wisata',
                            'harga_tiket', 'cover', 'status'];
    public $timestamps = true;

    public function kategori() {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }

    public function galeri() {
        return $this->hasMany('App\Models\Galeri', 'id_wisata');
    }

    public function cover()
    {
        if ($this->cover && file_exists(public_path('front/images/cover/' . $this->cover))) {
            return asset('front/images/cover/' . $this->cover);
        } else {
            return asset('front/images/no_image.png');
        }
    }

    public function deleteCover()
    {
        if ($this->cover && file_exists(public_path('front/images/cover/' . $this->cover))) {
            return unlink(public_path('front/images/cover/' . $this->cover));
        }

    }

    public static function boot() {
        parent::boot();
        self::deleting(function($wisata) {
            //mengecek apakah penulis masih punya wisata
            if($wisata->galeri->count() > 0) {
                // menyiapkan pesan error
                $html = 'Wisata tidak bisa dihapus karena memilik Galeri : ';
                $html .= '<ul>';
                    foreach ($wisata->galeri as $data) {
                        $html .= "<li>$data->gambar</li>";
                    }
                        $html .= '</ul>';
                    Session::flash("flash_notification", [
                        "level" => "danger",
                        "message" => $html
                    ]);
                    // membatalkan proses penghapusan
                    return false;
            }
        });
    }
}
