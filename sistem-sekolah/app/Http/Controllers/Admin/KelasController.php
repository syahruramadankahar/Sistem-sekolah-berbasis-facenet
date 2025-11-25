<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    // 🟢 Tampilkan semua data kelas
    public function index()
    {
        $kelas = Kelas::all();
        return view('admin.kelas.index', compact('kelas'));
    }

    // 🟢 Form tambah data kelas
    public function create()
    {
        return view('admin.kelas.create');
    }

    // 🟢 Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|max:20',
            'tingkat' => 'required|max:10',
        ]);

        Kelas::create($request->all());

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan!');
    }

    // 🟢 Form edit data kelas
    public function edit(Kelas $kela)
    {
        return view('admin.kelas.edit', compact('kela'));
    }

    // 🟢 Update data kelas
    public function update(Request $request, Kelas $kela)
    {
        $request->validate([
            'nama_kelas' => 'required|max:20',
            'tingkat' => 'required|max:10',
        ]);

        $kela->update($request->all());

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Data kelas berhasil diperbarui!');
    }

    // 🟢 Hapus data kelas
    public function destroy(Kelas $kela)
    {
        $kela->delete();

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Data kelas berhasil dihapus!');
    }
}
