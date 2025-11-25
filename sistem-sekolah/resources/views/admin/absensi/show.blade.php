@extends('layouts.app')

@section('content')
<div class="page-inner">

    <a href="{{ route('admin.absensi.index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <div class="card shadow-sm p-4">
        <h3 class="fw-bold mb-3">
            <i class="bi bi-person-bounding-box me-2"></i> Detail Absensi
        </h3>

        <div class="row mb-3">
            <div class="col-md-6">
                <p><b>Nama Siswa:</b> {{ $absen->siswa->nama }}</p>
                <p><b>Kelas:</b> {{ $absen->siswa->kelas->nama_kelas ?? '_' }}</p>
                <p><b>Status:</b> {{ ucfirst($absen->status) }}</p>
                <p><b>Metode:</b> {{ ucfirst($absen->metode) }}</p>
                <p><b>Waktu:</b> {{ $absen->created_at->translatedFormat('d M Y - H:i') }}</p>
            </div>
            <div class="col-md-6">
                <b>Foto Bukti:</b><br>
                @if($absen->foto_bukti)
                    <img src="{{ asset('storage/foto_absensi/'.$absen->foto_bukti) }}"
                        class="img-fluid rounded border mt-2" style="max-width: 380px;">
                @else
                    <p class="text-muted">Tidak ada foto</p>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection
