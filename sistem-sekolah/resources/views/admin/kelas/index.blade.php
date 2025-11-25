@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Data Kelas</h3>
                    <h6 class="op-7 mb-2">Kelola data kelas dengan mudah dan efisien</h6>
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                    <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary btn-round">
                        <i class="fas fa-plus me-2"></i>Tambah Kelas
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card card-round">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" width="10%">No</th>
                                    <th width="20%">Nama Kelas</th>
                                    <th class="text-center" width="20%">Tingkat</th>
                                    <th class="text-center" width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($kelas as $item)
                                    <tr>
                                        <td class="text-center fw-bold text-dark">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="fw-bold text-dark">{{ $item->nama_kelas }}</div>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-primary fw-bold">{{ $item->tingkat }}</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('admin.kelas.edit', $item->id) }}"
                                                    class="btn btn-warning btn-icon btn-sm" title="Edit Kelas">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.kelas.destroy', $item->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-icon btn-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data kelas ini?')"
                                                        title="Hapus Kelas">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5">
                                            <div class="text-muted">
                                                <i class="fas fa-chalkboard-teacher fa-3x mb-3 opacity-25"></i>
                                                <h5 class="fw-bold">Belum ada data kelas</h5>
                                                <p>Silakan tambah data kelas terlebih dahulu</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .page-inner {
            padding: 0 15px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .table {
            margin-bottom: 0;
            border-radius: 8px;
            overflow: hidden;
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

        .table th:first-child {
            border-radius: 8px 0 0 0;
        }

        .table th:last-child {
            border-radius: 0 8px 0 0;
        }

        .table td {
            padding: 1.1rem 0.75rem;
            vertical-align: middle;
            border-color: #f8f9fa;
            font-weight: 500;
            color: #374151;
        }

        .table td:nth-child(2) {
            text-align: left;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(79, 70, 229, 0.03);
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: #ffffff;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(79, 70, 229, 0.08);
            transform: translateY(-1px);
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(79, 70, 229, 0.15);
        }

        .btn {
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            font-family: 'Inter', sans-serif;
        }

        .btn-sm {
            padding: 0.5rem 0.8rem;
            font-size: 0.85rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            box-shadow: 0 2px 10px rgba(79, 70, 229, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.4);
            background: linear-gradient(135deg, #6366f1, #4f46e5);
        }

        /* Tombol Icon Saja */
        .btn-icon {
            width: 40px;
            height: 40px;
            padding: 0;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
        }

        .btn-warning:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
            background: linear-gradient(135deg, #d97706, #f59e0b);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }

        .btn-danger:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
            background: linear-gradient(135deg, #dc2626, #ef4444);
            color: white;
        }

        .d-flex.gap-2 {
            gap: 0.5rem;
        }

        .text-primary {
            color: #4f46e5 !important;
        }

        .text-success {
            color: #10b981 !important;
        }

        .text-dark {
            color: #1f2937 !important;
            font-weight: 600;
        }

        .text-muted {
            color: #6b7280 !important;
            line-height: 1.5;
        }

        .fw-bold {
            font-weight: 700 !important;
        }

        .op-7 {
            opacity: 0.7;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            border: none;
            border-left: 4px solid #10b981;
            color: #065f46;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(16, 185, 129, 0.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .d-flex.align-items-left.align-items-md-center.flex-column.flex-md-row {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .table-responsive {
                border: 1px solid #e5e7eb;
                border-radius: 8px;
            }

            .table th,
            .table td {
                padding: 0.9rem 0.5rem;
                font-size: 0.85rem;
            }

            .btn-icon {
                width: 36px;
                height: 36px;
            }
        }

        @media (max-width: 576px) {
            .page-inner {
                padding: 0 10px;
            }

            .card-body {
                padding: 0.75rem;
            }

            .table td,
            .table th {
                padding: 0.7rem 0.4rem;
                font-size: 0.8rem;
            }

            .btn-sm {
                padding: 0.4rem 0.6rem;
                font-size: 0.75rem;
            }

            .btn-icon {
                width: 32px;
                height: 32px;
                border-radius: 6px;
            }

            .btn-icon i {
                font-size: 0.8rem;
            }

            .d-flex.gap-2 {
                gap: 0.3rem;
            }
        }

        @media (max-width: 400px) {
            .table-responsive {
                font-size: 0.75rem;
            }

            .btn-icon {
                width: 28px;
                height: 28px;
            }

            .btn-icon i {
                font-size: 0.7rem;
            }
        }
    </style>
@endsection
