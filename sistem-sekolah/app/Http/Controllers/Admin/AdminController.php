<?php

namespace App\Http\Controllers\Admin; // ✅ ubah namespace sesuai folder

use App\Http\Controllers\Controller; // ✅ tambahkan ini agar class Controller dikenali

use App\Models\User;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Berita;
use App\Models\Galeri;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        return view('admin.dashboard', [
            'total_user'   => User::count(),
            'total_siswa'  => Siswa::count(),
            'total_kelas'  => Kelas::count(),
            'total_berita' => Berita::count(),
            'total_galeri' => Galeri::count(),
        ]);
    }
}
