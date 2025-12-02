@extends('layouts.app')

@section('content')
    <div class="page-inner">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-journal-check me-2"></i> Manajemen Absensi
                </h3>
                <p class="text-muted mb-0">Kelola data absensi dengan mudah dan efisien</p>
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
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr class="table-header-custom">
                                    <th width="5%" class="text-center">NO</th>
                                    <th width="15%" class="text-center">Tanggal</th>
                                    <th width="20%" class="text-center">Nama Siswa</th>
                                    <th width="15%" class="text-center">Kelas</th>
                                    <th width="10%" class="text-center">Status</th>
                                    <th width="10%" class="text-center">Metode</th>
                                    <th width="15%" class="text-center">Foto Bukti</th>
                                    <th width="10%" class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($absensi as $index => $item)
                                    <tr>
                                        <td class="fw-bold text-center">{{ $index + 1 }}</td>
                                        <td class="text-center">{{ $item->created_at->translatedFormat('d M Y - H:i') }}
                                        </td>

                                        <td class="text-center">{{ $item->siswa->nama }}</td>

                                        <td class="text-center">{{ $item->siswa->kelas->nama_kelas ?? '-' }}</td>

                                        <td style="padding: 16px 20px;">
                                            @if ($item->status == 'hadir')
                                                <span class="badge status-badge"
                                                    style="background: #27ae60; color: white; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 500;">
                                                    <i class="fas fa-check-circle me-1"></i>Hadir
                                                </span>
                                            @elseif($item->status == 'sakit')
                                                <span class="badge status-badge"
                                                    style="background: #f39c12; color: white; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 500;">
                                                    <i class="fas fa-thermometer-half me-1"></i>Sakit
                                                </span>
                                            @elseif($item->status == 'izin')
                                                <span class="badge status-badge"
                                                    style="background: #3498db; color: white; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 500;">
                                                    <i class="fas fa-file-alt me-1"></i>Izin
                                                </span>
                                            @else
                                                <span class="badge status-badge"
                                                    style="background: #e74c3c; color: white; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 500;">
                                                    <i class="fas fa-times-circle me-1"></i>Alpha
                                                </span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <span class="badge method-badge bg-primary ">{{ ucfirst($item->metode) }}</span>
                                        </td>

                                        <td class="text-center">
                                            @if ($item->foto_bukti)
                                                <img src="{{ asset('storage/foto_absensi/' . $item->foto_bukti) }}"
                                                    class="rounded proof-image" width="45" height="45">
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <div class="d-flex gap-1 justify-content-center">
                                                <a href="{{ route('admin.absensi.show', $item->id) }}"
                                                    class="btn btn-sm btn-info action-btn">
                                                    <i class="bi bi-eye"></i>
                                                </a>

                                                <a href="{{ route('admin.absensi.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm action-btn">
                                                    <i class="bi bi-pencil"></i>
                                                </a>

                                                <form action="{{ route('admin.absensi.destroy', $item->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Hapus absensi ini?')"
                                                        class="btn btn-danger btn-sm action-btn">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted py-4">
                                            <i class="bi bi-emoji-frown fs-4 d-block mb-2"></i>
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

    <style>
        .btn-round {
            border-radius: 20px;
        }

        .table {
            margin-bottom: 0;
            border-radius: 8px;
            overflow: hidden;
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .table-header-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: white !important;
        }

        .table-header-custom th {
            font-weight: 600;
            font-size: 0.9rem;
            border: none;
            padding: 15px 10px;
        }

        .table th {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            border: none;
            font-weight: 700;
            padding: 1.3rem 0.75rem;
            color: white;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            text-align: center;
            vertical-align: middle;
            border-bottom: 3px solid #3730a3;
            text-transform: uppercase;
            font-family: 'Inter', sans-serif;
        }

        .table td {
            border: none;
            padding: 12px 10px;
            vertical-align: middle;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-badge {
            min-width: 70px;
        }

        .method-badge {
            min-width: 60px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .card-round {
            border-radius: 12px;
        }

        .page-inner {
            padding: 20px;
            background: #f8f9fa;
        }

        .proof-image {
            object-fit: cover;
            border: 2px solid #e9ecef;
            transition: transform 0.2s;
        }

        .proof-image:hover {
            transform: scale(1.1);
        }

        .action-btn {
            border-radius: 8px;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(102, 126, 234, 0.05);
            transform: translateY(-1px);
            transition: all 0.2s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 8px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
    </style>
@endsection
