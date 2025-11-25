<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi'; // penting karena default-nya "absensis"

    protected $fillable = [
        'siswa_id',
        'status',
        'foto_bukti',
        'metode',
    ];

    // 🔗 Relasi ke siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
