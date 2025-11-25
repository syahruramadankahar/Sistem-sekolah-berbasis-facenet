@extends('layouts.app')

@section('content')

<div class="page-inner">
    <h3 class="fw-bold mb-4">Tambah Absensi</h3>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.absensi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Siswa</label>
                        <select name="siswa_id" class="form-control" required>
                            <option value="">-- Pilih Siswa --</option>
                            @foreach($siswa as $item)
                                <option value="{{ $item->id }}" {{ old('siswa_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }} ({{ $item->kelas->nama_kelas ?? '-' }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="hadir">Hadir</option>
                            <option value="izin">Izin</option>
                            <option value="alpha">Alpha</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Metode</label>
                        <select name="metode" class="form-control" required>
                            <option value="wajah">Wajah</option>
                            <option value="manual">Manual</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Foto Bukti (opsional)</label>
                        <input type="file" name="foto_bukti" class="form-control" accept="image/*">
                    </div>

                </div>

                <button class="btn btn-primary mt-3">Simpan</button>
            </form>

        </div>
    </div>

</div>

@endsection
