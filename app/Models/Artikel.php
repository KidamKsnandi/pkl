<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $visible = ['judul', 'konten'];
    protected $fillable = ['judul', 'konten'];
    public $timestamps = true;
}
