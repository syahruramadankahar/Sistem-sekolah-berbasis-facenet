<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'penulis_id',
    ];

    /**
     * Relasi ke model User (penulis berita)
     * Setiap berita ditulis oleh satu user (penulis)
     */
    public function penulis()
    {
        return $this->belongsTo(User::class, 'penulis_id');
    }

    /**
     * Akses URL gambar dengan otomatis dari storage
     * Supaya di Blade bisa langsung pakai {{ $berita->gambar_url }}
     */
    public function getGambarUrlAttribute()
    {
        if ($this->gambar && Storage::disk('public')->exists($this->gambar)) {
            return asset('storage/' . $this->gambar);
        }
        return asset('images/no-image.png'); // fallback jika tidak ada gambar
    }
}