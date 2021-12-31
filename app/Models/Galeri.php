<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $visible = ['id_wisata', 'gambar'];
    protected $fillable = ['id_wisata', 'gambar'];
    public $timestamps = true;

    public function wisata() {
        return $this->belongsTo('App\Models\Wisata', 'id_wisata');
    }

    public function galeri()
    {
        if ($this->gambar && file_exists(public_path('front/images/galeri/' . $this->gambar))) {
            return asset('front/images/galeri/' . $this->gambar);
        } else {
            return asset('front/images/no_image.png');
        }
    }

    public function deleteGaleri()
    {
        if ($this->gambar && file_exists(public_path('front/images/galeri/' . $this->gambar))) {
            return unlink(public_path('front/images/galeri/' . $this->gambar));
        }

    }
}
