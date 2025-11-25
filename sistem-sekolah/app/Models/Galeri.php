<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';
    protected $fillable = ['judul', 'gambar', 'tanggal', 'uploader_id'];

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploader_id');
    }
}
