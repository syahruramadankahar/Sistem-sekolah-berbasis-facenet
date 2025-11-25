@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Edit Kelas</h3>
                    <h6 class="op-7 mb-2">Perbarui data kelas yang sudah ada</h6>
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                    <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary btn-round">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>

            <div class="card card-round">
                <div class="card-body">
                    <form action="{{ route('admin.kelas.update', $kela->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark mb-2">Nama Kelas</label>
                                    <input type="text" name="nama_kelas" class="form-control form-control-lg"
                                        value="{{ old('nama_kelas', $kela->nama_kelas) }}" placeholder="Contoh: X TJKT 1"
                                        required
                                        style="border-radius: 8px; border: 2px solid #e5e7eb; padding: 12px 16px; font-size: 1rem; transition: all 0.3s ease;">
                                    <div class="form-text text-muted mt-2">
                                        <i class="fas fa-info-circle me-1"></i>Masukkan nama kelas yang jelas dan mudah
                                        dipahami
                                    </div>
                                    @error('nama_kelas')
                                        <div class="text-danger mt-2" style="font-size: 0.875rem;">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark mb-2">Tingkat</label>
                                    <input type="text" name="tingkat" class="form-control form-control-lg"
                                        value="{{ old('tingkat', $kela->tingkat) }}" placeholder="Contoh: X, XI, XII"
                                        required
                                        style="border-radius: 8px; border: 2px solid #e5e7eb; padding: 12px 16px; font-size: 1rem; transition: all 0.3s ease;">
                                    <div class="form-text text-muted mt-2">
                                        <i class="fas fa-info-circle me-1"></i>Masukkan tingkat kelas (X, XI, XII)
                                    </div>
                                    @error('tingkat')
                                        <div class="text-danger mt-2" style="font-size: 0.875rem;">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card bg-light rounded-3 border-0">
                                    <div class="card-body">
                                        <h6 class="fw-bold text-dark mb-3">
                                            <i class="fas fa-edit me-2 text-primary"></i>Edit Kelas
                                        </h6>
                                        <p class="text-muted small mb-0">
                                            Perbarui informasi kelas sesuai kebutuhan. Pastikan data yang dimasukkan
                                            konsisten dengan sistem.
                                        </p>
                                    </div>
                                </div>

                                <div class="card bg-info bg-opacity-10 rounded-3 border-0 mt-3">
                                    <div class="card-body">
                                        <h6 class="fw-bold text-dark mb-3">
                                            <i class="fas fa-lightbulb me-2 text-info"></i>Data Saat Ini
                                        </h6>
                                        <div class="text-muted small">
                                            <div class="mb-2">
                                                <span class="fw-semibold">Nama Kelas:</span><br>
                                                <span class="text-primary">{{ $kela->nama_kelas }}</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="fw-semibold">Tingkat:</span><br>
                                                <span class="text-success">{{ $kela->tingkat }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card bg-warning bg-opacity-10 rounded-3 border-0 mt-3">
                                    <div class="card-body">
                                        <h6 class="fw-bold text-dark mb-3">
                                            <i class="fas fa-exclamation-triangle me-2 text-warning"></i>Perhatian
                                        </h6>
                                        <p class="text-muted small mb-0">
                                            Perubahan data kelas akan mempengaruhi data siswa dan mata pelajaran yang
                                            terkait dengan kelas ini.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mt-4">
                            <button type="submit" class="btn btn-primary btn-round btn-lg">
                                <i class="fas fa-save me-2"></i>Perbarui Kelas
                            </button>
                            <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary btn-round btn-lg">
                                <i class="fas fa-times me-2"></i>Batal
                            </a>
                        </div>
                    </form>
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

        .form-control {
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
            transform: translateY(-2px);
        }

        .form-label {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
        }

        .btn {
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            font-family: 'Inter', sans-serif;
            padding: 12px 24px;
        }

        .btn-lg {
            padding: 14px 28px;
            font-size: 1rem;
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

        .btn-secondary {
            background: linear-gradient(135deg, #6b7280, #4b5563);
            box-shadow: 0 2px 10px rgba(107, 114, 128, 0.3);
            color: white;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(107, 114, 128, 0.4);
            background: linear-gradient(135deg, #4b5563, #6b7280);
            color: white;
        }

        .btn-round {
            border-radius: 8px;
        }

        .d-flex.gap-3 {
            gap: 1rem;
        }

        .text-primary {
            color: #4f46e5 !important;
        }

        .text-dark {
            color: #1f2937 !important;
        }

        .text-muted {
            color: #6b7280 !important;
        }

        .text-info {
            color: #06b6d4 !important;
        }

        .text-success {
            color: #10b981 !important;
        }

        .text-warning {
            color: #f59e0b !important;
        }

        .fw-bold {
            font-weight: 700 !important;
        }

        .fw-semibold {
            font-weight: 600 !important;
        }

        .bg-light {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9) !important;
        }

        .bg-info {
            background: linear-gradient(135deg, #cffafe, #a5f3fc) !important;
        }

        .bg-warning {
            background: linear-gradient(135deg, #fef3c7, #fde68a) !important;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .d-flex.align-items-left.align-items-md-center.flex-column.flex-md-row {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .d-flex.gap-3 {
                flex-direction: column;
                gap: 0.75rem;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .card-body {
                padding: 1rem;
            }
        }

        @media (max-width: 576px) {
            .page-inner {
                padding: 0 10px;
            }

            .form-control-lg {
                padding: 10px 14px;
                font-size: 0.9rem;
            }

            .btn-lg {
                padding: 12px 20px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 400px) {
            .form-control-lg {
                padding: 8px 12px;
                font-size: 0.85rem;
            }

            .btn-lg {
                padding: 10px 16px;
                font-size: 0.85rem;
            }
        }
    </style>
@endsection
