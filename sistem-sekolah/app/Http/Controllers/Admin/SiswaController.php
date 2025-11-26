<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->get();
        return view('admin.siswa.index', compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required',
            'nis'      => 'required|unique:siswa,nis',
            'kelas_id' => 'required|integer',
            'jurusan'  => 'required',
            'alamat'   => 'nullable',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('foto');
        $data['user_id'] = Auth::id();

        // Upload Foto
        if ($request->hasFile('foto')) {
            $filename = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('siswa', $filename, 'public');
            $data['foto'] = $filename;
        }

        Siswa::create($data);

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        return view('admin.siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama'     => 'required',
            'nis'      => 'required|unique:siswa,nis,' . $siswa->id,
            'kelas_id' => 'required|integer',
            'jurusan'  => 'required',
            'alamat'   => 'nullable',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('foto');

        // Ganti Foto
        if ($request->hasFile('foto')) {

            // Hapus foto lama jika ada
            if ($siswa->foto && Storage::disk('public')->exists('siswa/'.$siswa->foto)) {
                Storage::disk('public')->delete('siswa/'.$siswa->foto);
            }

            $filename = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('siswa', $filename, 'public');
            $data['foto'] = $filename;
        }

        $siswa->update($data);

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy(Siswa $siswa)
    {
        // Hapus foto jika ada
        if ($siswa->foto && Storage::disk('public')->exists('siswa/'.$siswa->foto)) {
            Storage::disk('public')->delete('siswa/'.$siswa->foto);
        }

        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil dihapus!');
    }
}
