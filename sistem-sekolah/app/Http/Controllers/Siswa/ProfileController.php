<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Berita;
use App\Models\Galeri;

class ProfileController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        // Ambil data siswa berdasarkan user_id
        $siswa = Siswa::where('user_id', $user->id)->first();

        // Jika siswa tidak ditemukan → redirect error
        if (!$siswa) {
            return back()->with('error', 'Data siswa tidak ditemukan.');
        }

        return view('siswa.dashboard', [
            'siswa' => $siswa,
            'berita' => Berita::latest()->take(4)->get(),
            'galeri' => Galeri::latest()->take(4)->get(),
        ]);
    }

    public function profil()
    {
        $user = Auth::user();
        $siswa = Siswa::where('user_id', $user->id)->first();

        return view('siswa.profil', compact('siswa'));
    }
}
