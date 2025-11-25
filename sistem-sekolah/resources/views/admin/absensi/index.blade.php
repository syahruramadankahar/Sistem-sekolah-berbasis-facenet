@extends('layouts.app')

@section('content')
<div class="page-inner">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">
            <i class="bi bi-journal-check me-2"></i> Manajemen Absensi
        </h3>
    </div>

    {{-- FILTER SECTION --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <form method="GET">
                <div class="row g-3">

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control"
                               value="{{ request('tanggal') }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Kelas</label>
                        <select name="kelas_id" class="form-select">
                            <option value="">Semua</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}" 
                                    {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Siswa</label>
                        <select name="siswa_id" class="form-select">
                            <option value="">Semua</option>
                            @foreach($siswa as $s)
                                <option value="{{ $s->id }}"
                                    {{ request('siswa_id') == $s->id ? 'selected' : '' }}>
                                    {{ $s->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Metode</label>
                        <select name="metode" class="form-select">
                            <option value="">Semua</option>
                            <option value="wajah" {{ request('metode')=='wajah' ? 'selected' : '' }}>
                                Wajah
                            </option>
                            <option value="manual" {{ request('metode')=='manual' ? 'selected' : '' }}>
                                Manual
                            </option>
                        </select>
                    </div>

                </div>

                <button class="btn btn-primary mt-3">
                    <i class="bi bi-funnel-fill me-1"></i> Filter
                </button>

            </form>

        </div>
    </div>

    <div class="card card-round mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h4 class="mb-0 fw-bold">Data Absensi</h4>

            <a href="{{ route('admin.absensi.create') }}" class="btn btn-primary btn-round">
                <i class="fas fa-plus me-2"></i> Tambah Data
            </a>
        </div>
    </div>

    {{-- TABEL ABSENSI --}}
    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th width="15%">Tanggal</th>
                            <th width="20%">Nama Siswa</th>
                            <th width="15%">Kelas</th>
                            <th width="10%">Status</th>
                            <th width="10%">Metode</th>
                            <th width="10%">Foto Bukti</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($absensi as $item)
                        <tr>
                            <td>{{ $item->created_at->translatedFormat('d M Y - H:i') }}</td>

                            <td>{{ $item->siswa->nama }}</td>

                            <<td>{{ $item->siswa->kelas->nama_kelas ?? '-' }}</td>

                            <td>
                                <span class="badge bg-success">{{ ucfirst($item->status) }}</span>
                            </td>

                            <td>
                                <span class="badge bg-primary">{{ ucfirst($item->metode) }}</span>
                            </td>

                            <td>
                                @if($item->foto_bukti)
                                    <img src="{{ asset('storage/foto_absensi/'.$item->foto_bukti) }}"
                                        class="rounded" width="45">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('admin.absensi.show', $item->id) }}" 
                                   class="btn btn-sm btn-info">
                                    Detail
                                </a>

                                <a href="{{ route('admin.absensi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('admin.absensi.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus absensi ini?')" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="bi bi-emoji-frown fs-4 d-block"></i>
                                Tidak ada data absensi.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            <div class="mt-3">
                {{ $absensi->links() }}
            </div>

        </div>
    </div>

</div>
@endsection
