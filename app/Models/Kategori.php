<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Kategori extends Model
{
    use HasFactory;

    protected $visible = ['nama_kategori', 'deskripsi_kategori'];
    protected $fillable = ['nama_kategori', 'deskripsi_kategori'];
    public $timestamps = true;

    public function wisata() {
        return $this->hasMany('App\Models\Wisata', 'id_kategori');
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($kategori) {
            //mengecek apakah penulis masih punya wisata
            if($kategori->wisata->count() > 0) {
                // menyiapkan pesan error
                $html = 'Kategori tidak bisa dihapus karena memilik wisata : ';
                $html .= '<ul>';
                    foreach ($kategori->wisata as $data) {
                        $html .= "<li>$data->nama_wisata</li>";
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
