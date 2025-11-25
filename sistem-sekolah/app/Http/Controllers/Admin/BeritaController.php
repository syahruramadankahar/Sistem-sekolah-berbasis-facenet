<?php

namespace App\Http\Controllers\Admin; // ✅ ubah namespace sesuai folder

use App\Http\Controllers\Controller; // ✅ tambahkan ini agar class Controller dikenali

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::with('penulis')->get();
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        // 🔹 Tambahkan baris ini supaya variabel $users dikirim ke view
        $users = User::all();
        return view('admin.berita.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:150',
            'isi' => 'required',
            'gambar' => 'nullable|image|max:2048',
            'penulis_id' => 'required|exists:users,id',
        ]);

        $data = $request->only(['judul', 'isi', 'penulis_id']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $users = User::all(); // 🔹 Tambahkan juga di sini
        return view('admin.berita.edit', compact('berita', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:150',
            'isi' => 'required',
            'gambar' => 'nullable|image|max:2048',
            'penulis_id' => 'required|exists:users,id',
        ]);

        $berita = Berita::findOrFail($id);
        $data = $request->only(['judul', 'isi', 'penulis_id']);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
