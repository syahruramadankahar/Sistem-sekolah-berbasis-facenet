<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AbsensiController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user->siswa) {
            return abort(403, "Akun ini tidak terkait dengan data siswa.");
        }

        $siswa = $user->siswa;

        $absensi = Absensi::where('siswa_id', $siswa->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('siswa.absensi.absensi', compact('absensi'));
    }

    public function wajah($tipe = 'masuk')
    {
        return view('siswa.absensi.wajah', compact('tipe'));
    }

    public function store(Request $request)
    {
        try {
            // Log untuk debugging
            \Log::info('Request data:', $request->all());

            // ⬅️ VALIDASI TANPA 'tipe'
            $validated = $request->validate([
                'siswa_id'   => 'required|exists:siswa,id',
                'status'     => 'required|in:hadir,sakit,izin',
                'foto_bukti' => 'nullable|string'
            ]);

            // ⬅️ CREATE TANPA 'tipe'
            $absensi = Absensi::create([
                'siswa_id'   => $validated['siswa_id'],
                'status'     => $validated['status'],
                'metode'     => 'wajah',
                'foto_bukti' => $validated['foto_bukti'] ?? null,
            ]);

            \Log::info('Absensi berhasil dibuat:', $absensi->toArray());

            return response()->json([
                'status'  => 'success',
                'message' => 'Absensi berhasil dicatat!',
                'data'    => $absensi
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error:', $e->errors());

            return response()->json([
                'status'  => 'error',
                'message' => 'Validasi gagal',
                'errors'  => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Error: ' . $e->getMessage());

            return response()->json([
                'status'  => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
