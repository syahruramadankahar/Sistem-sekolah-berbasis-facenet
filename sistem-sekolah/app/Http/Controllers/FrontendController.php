<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Galeri;

class FrontendController extends Controller
{
    // 🏠 Halaman Beranda
    public function index()
    {
        $berita = Berita::latest()->take(3)->get();
        $galeri = Galeri::latest()->take(6)->get();

        return view('frontend.index', compact('berita', 'galeri'));
    }

    // 📘 Profil Sekolah
    public function profil()
    {
        return view('frontend.profil');
    }

    public function berita(?int $id = null)
    {
        if ($id !== null) {
            // MODE DETAIL
            $selectedBerita = Berita::findOrFail($id);
            $related = Berita::where('id', '!=', $id)->latest()->take(3)->get();
            $berita = Berita::latest()->take(5)->get(); // 🔥 Tambah ini untuk sidebar

            return view('frontend.berita', compact('selectedBerita', 'related', 'berita'));
        }

        // MODE LIST
        $berita = Berita::latest()->paginate(6);
        return view('frontend.berita', compact('berita'));
    }

    // 🖼️ Halaman Galeri Publik
    public function galeri()
    {
        $galeri = Galeri::latest()->paginate(8);
        return view('frontend.galeri', compact('galeri'));
    }

    // 📞 Halaman Kontak
    public function kontak()
    {
        return view('frontend.kontak');
    }
}
