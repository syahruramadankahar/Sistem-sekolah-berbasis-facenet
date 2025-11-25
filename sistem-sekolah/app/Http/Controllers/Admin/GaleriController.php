<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::with('uploader')->latest()->get();
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'gambar' => 'required|image|max:2048',
            'tanggal' => 'nullable|date',
        ]);

        $path = $request->file('gambar')->store('galeri', 'public');

        Galeri::create([
            'judul' => $request->judul,
            'gambar' => $path,
            'tanggal' => $request->tanggal,
            'uploader_id' => Auth::id(),
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Gambar berhasil diunggah!');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'gambar' => 'nullable|image|max:2048',
            'tanggal' => 'nullable|date',
        ]);

        $data = [
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
        ];

        if ($request->hasFile('gambar')) {
            Storage::delete('public/' . $galeri->gambar);
            $data['gambar'] = $request->file('gambar')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroy(Galeri $galeri)
    {
        Storage::delete('public/' . $galeri->gambar);
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Gambar berhasil dihapus!');
    }
}
