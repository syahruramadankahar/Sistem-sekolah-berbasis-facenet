<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'siswa';

    // Kolom yang boleh diisi mass-assignment
    protected $fillable = [
        'user_id',
        'nis',
        'nama',
        'kelas_id',
        'jurusan',
        'alamat',
        'foto'
    ];

    // Relasi ke model User (Setiap siswa dimiliki oleh 1 user)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke model Kelas (Setiap siswa berada di 1 kelas)
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'siswa_id');
    }
}
