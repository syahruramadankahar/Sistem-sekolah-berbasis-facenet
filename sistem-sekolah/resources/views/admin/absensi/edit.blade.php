@extends('layouts.app')

@section('content')
<div class="page-inner">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Edit Data Absensi</h3>
        <a href="{{ route('admin.absensi.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.absensi.update', $absen->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- =============== SISWA =============== --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Siswa</label>
                    <select name="siswa_id" class="form-select" required>
                        <option value="">— Pilih Siswa —</option>
                        @foreach($siswa as $item)
                            <option value="{{ $item->id }}" 
                                {{ $absen->siswa_id == $item->id ? 'selected' : '' }}>
                                {{ $item->nama }} — {{ $item->kelas->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- =============== STATUS =============== --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="hadir" {{ $absen->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="izin"  {{ $absen->status == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="alpha" {{ $absen->status == 'alpha' ? 'selected' : '' }}>Alpha</option>
                    </select>
                </div>

                {{-- =============== METODE =============== --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Metode Absensi</label>
                    <select name="metode" class="form-select" required>
                        <option value="wajah"   {{ $absen->metode == 'wajah' ? 'selected' : '' }}>Wajah</option>
                        <option value="manual"  {{ $absen->metode == 'manual' ? 'selected' : '' }}>Manual</option>
                    </select>
                </div>

                {{-- =============== FOTO BUKTI =============== --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Foto Bukti Absensi</label>

                    <div class="mb-2">
                        @if($absen->foto_bukti)
                            <img src="{{ asset('storage/foto_absensi/'.$absen->foto_bukti) }}"
                                alt="Foto Bukti" 
                                class="rounded border"
                                width="160"
                                style="object-fit: cover"
                                onerror="this.src='{{ asset('template1/assets/img/no-image.png') }}'">
                        @else
                            <img src="{{ asset('template1/assets/img/no-image.png') }}"
                                alt="Tidak ada foto" 
                                class="rounded border"
                                width="160"
                                style="object-fit: cover">
                        @endif
                    </div>

                    <input type="file" name="foto_bukti" class="form-control">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto bukti.</small>
                </div>

                {{-- =============== BUTTON SUBMIT =============== --}}
                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i> Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
