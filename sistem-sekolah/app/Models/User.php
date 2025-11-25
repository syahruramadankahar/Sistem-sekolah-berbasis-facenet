<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'user_id');
    }

    // Relasi ke Berita
    public function berita()
    {
        return $this->hasMany(Berita::class, 'penulis_id');
    }

    // Relasi ke Galeri
    public function galeri()
    {
        return $this->hasMany(Galeri::class, 'uploader_id');
    }
}
