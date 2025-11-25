<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    // ============================================================
    // LIST + FILTER
    // ============================================================
    public function index(Request $request)
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();
        $siswa = Siswa::orderBy('nama')->get();

        $query = Absensi::with(['siswa.kelas'])
            ->orderBy('created_at', 'desc');

        if ($request->tanggal) {
            $query->whereDate('waktu', $request->tanggal);
        }

        if ($request->kelas_id) {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('kelas_id', $request->kelas_id);
            });
        }

        if ($request->siswa_id) {
            $query->where('siswa_id', $request->siswa_id);
        }

        if ($request->metode) {
            $query->where('metode', $request->metode);
        }

        if ($request->tipe) {
            $query->where('tipe', $request->tipe);
        }

        $absensi = $query->paginate(10);

        return view('admin.absensi.index', compact('absensi', 'kelas', 'siswa'));
    }


    // ============================================================
    // DETAIL
    // ============================================================
    public function show($id)
    {
        $absen = Absensi::with('siswa.kelas')->findOrFail($id);
        return view('admin.absensi.show', compact('absen'));
    }


    // ============================================================
    // CREATE
    // ============================================================
    public function create()
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();
        $siswa = Siswa::orderBy('nama')->get();

        return view('admin.absensi.create', compact('kelas', 'siswa'));
    }


    // ============================================================
    // STORE
    // ============================================================
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id'   => 'required|exists:siswa,id',
            'status'     => 'required|in:hadir,izin,alpha',
            'metode'     => 'required|in:wajah,manual',
            'foto_bukti' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'siswa_id' => $request->siswa_id,
            'status'   => $request->status,
            'metode'   => $request->metode,
        ];

        // === Upload Foto Bukti ===
        if ($request->hasFile('foto_bukti')) {

            $file = $request->file('foto_bukti');
            $filename = time() . '_' . $file->getClientOriginalName();

            // simpan file ke storage/app/public/foto_absensi
            $file->storeAs('foto_absensi', $filename, 'public');

            // simpan NAMA FILE saja di database
            $data['foto_bukti'] = $filename;
        }

        Absensi::create($data);

        return redirect()
            ->route('admin.absensi.index')
            ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    // ============================================================
    // EDIT
    // ============================================================
    public function edit($id)
    {
        $absen = Absensi::findOrFail($id);
        $kelas = Kelas::orderBy('nama_kelas')->get();
        $siswa = Siswa::orderBy('nama')->get();

        return view('admin.absensi.edit', compact('absen', 'kelas', 'siswa'));
    }


    // ============================================================
    // UPDATE
    // ============================================================
    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required|integer',
            'status'   => 'required|string',
            'metode'   => 'required|string',
            'foto_bukti' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $absen = Absensi::findOrFail($id);

        $absen->siswa_id = $request->siswa_id;
        $absen->status   = $request->status;
        $absen->metode   = $request->metode;

        // ============= UPDATE FOTO =============
        if ($request->hasFile('foto_bukti')) {

            // hapus foto lama
            if ($absen->foto_bukti && file_exists(storage_path('app/public/foto_absensi/' . $absen->foto_bukti))) {
                unlink(storage_path('app/public/foto_absensi/' . $absen->foto_bukti));
            }

            $file = $request->file('foto_bukti');
            $filename = time() . '_' . $file->getClientOriginalName();

            // simpan ke folder yang sama
            $file->storeAs('foto_absensi', $filename, 'public');

            // simpan nama file
            $absen->foto_bukti = $filename;
        }

        $absen->save();

        return redirect()->route('admin.absensi.index')
            ->with('success', 'Data absensi berhasil diperbarui.');
    }


    // ============================================================
    // DELETE
    // ============================================================
    public function destroy($id)
    {
        $absen = Absensi::findOrFail($id);

        if ($absen->foto_bukti && file_exists(storage_path('app/public/foto_absensi/' . $absen->foto_bukti))) {
            unlink(storage_path('app/public/foto_absensi/' . $absen->foto_bukti));
        }

        $absen->delete();

        return redirect()->route('admin.absensi.index')
            ->with('success', 'Data absensi berhasil dihapus!');
    }
}
