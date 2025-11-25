<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    // ==========================================================
    // 📌 1. RIWAYAT ABSENSI SISWA LOGIN
    // ==========================================================
public function index()
{
    // ambil user yang sedang login
    $user = Auth::user();

    // pastikan user punya relasi siswa
    if (!$user->siswa) {
        return abort(403, "Akun ini tidak terkait dengan data siswa.");
    }

    $siswa = $user->siswa;

    // ambil absensi khusus siswa ini
    $absensi = Absensi::where('siswa_id', $siswa->id)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('siswa.absensi.absensi', compact('absensi'));
}


    // ==========================================================
    // 📌 2. HALAMAN KAMERA ABSENSI WAJAH
    // ==========================================================
    public function wajah($tipe = 'masuk')
    {
        return view('siswa.absensi.wajah', compact('tipe'));
    }


    // ==========================================================
    // 📌 3. SIMPAN ABSENSI SETELAH VERIFIKASI FASTAPI
    // ==========================================================
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'tipe'     => 'required|string',  // masuk / pulang
            'foto_bukti' => 'nullable|string'
        ]);

        Absensi::create([
            'siswa_id' => $request->siswa_id,
            'status'   => 'hadir',       // default
            'metode'   => 'wajah',       // metode otomatis wajah
            'created_at' => now(),
            'foto_bukti' => $request->foto_bukti, // ⬅️ simpan path foto
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Absensi berhasil dicatat!'
        ]);
    }
}
