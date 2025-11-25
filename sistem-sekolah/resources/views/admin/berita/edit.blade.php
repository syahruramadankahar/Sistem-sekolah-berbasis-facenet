@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Edit Berita</h3>
                    <h6 class="op-7 mb-2">Perbarui berita yang sudah ada</h6>
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary btn-round">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>

            <div class="card card-round">
                <div class="card-body">
                    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark mb-2">Judul Berita</label>
                                    <input type="text" name="judul" class="form-control form-control-lg"
                                        value="{{ old('judul', $berita->judul) }}" placeholder="Masukkan judul berita"
                                        required
                                        style="border-radius: 8px; border: 2px solid #e5e7eb; padding: 12px 16px; font-size: 1rem; transition: all 0.3s ease;">
                                    @error('judul')
                                        <div class="text-danger mt-2" style="font-size: 0.875rem;">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark mb-2">Isi Berita</label>
                                    <textarea name="isi" rows="8" class="form-control form-control-lg" placeholder="Tulis isi berita di sini..."
                                        required
                                        style="border-radius: 8px; border: 2px solid #e5e7eb; padding: 12px 16px; font-size: 1rem; transition: all 0.3s ease; resize: vertical;">{{ old('isi', $berita->isi) }}</textarea>
                                    @error('isi')
                                        <div class="text-danger mt-2" style="font-size: 0.875rem;">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark mb-2">Gambar</label>

                                    @if ($berita->gambar)
                                        <div class="mb-3">
                                            <p class="text-muted mb-2">Gambar saat ini:</p>
                                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                                class="rounded"
                                                style="width: 150px; height: 100px; object-fit: cover; border: 2px solid #e5e7eb;">
                                        </div>
                                    @endif

                                    <input type="file" name="gambar" class="form-control form-control-lg"
                                        accept="image/*"
                                        style="border-radius: 8px; border: 2px solid #e5e7eb; padding: 12px 16px; font-size: 1rem; transition: all 0.3s ease;">
                                    <div class="form-text text-muted mt-2">
                                        <i class="fas fa-info-circle me-1"></i>Biarkan kosong jika tidak ingin mengganti
                                        gambar. Format: JPG, PNG, JPEG. Maks: 2MB
                                    </div>
                                    @error('gambar')
                                        <div class="text-danger mt-2" style="font-size: 0.875rem;">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold text-dark mb-2">Penulis</label>
                                    <select name="penulis_id" class="form-control form-control-lg" required
                                        style="border-radius: 8px; border: 2px solid #e5e7eb; padding: 12px 16px; font-size: 1rem; transition: all 0.3s ease;">
                                        <option value="">-- Pilih Penulis --</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ old('penulis_id', $berita->penulis_id) == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('penulis_id')
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
                                            <i class="fas fa-edit me-2 text-primary"></i>Edit Berita
                                        </h6>
                                        <p class="text-muted small mb-0">
                                            Perbarui informasi berita sesuai kebutuhan. Pastikan konten tetap relevan dan
                                            informatif bagi pembaca.
                                        </p>
                                    </div>
                                </div>

                                @if ($berita->gambar)
                                    <div class="card bg-warning bg-opacity-10 rounded-3 border-0 mt-3">
                                        <div class="card-body">
                                            <h6 class="fw-bold text-dark mb-3">
                                                <i class="fas fa-image me-2 text-warning"></i>Preview Gambar
                                            </h6>
                                            <div class="text-center">
                                                <img src="{{ asset('storage/' . $berita->gambar) }}"
                                                    alt="{{ $berita->judul }}" class="rounded mb-2"
                                                    style="width: 100%; max-width: 200px; height: auto; object-fit: cover; border: 2px solid #e5e7eb;">
                                                <p class="text-muted small mb-0">{{ $berita->judul }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="card bg-info bg-opacity-10 rounded-3 border-0 mt-3">
                                    <div class="card-body">
                                        <h6 class="fw-bold text-dark mb-3">
                                            <i class="fas fa-lightbulb me-2 text-info"></i>Tips Edit Berita
                                        </h6>
                                        <ul class="list-unstyled text-muted small mb-0">
                                            <li class="mb-2">
                                                <i class="fas fa-check-circle text-success me-2"></i>
                                                Periksa kembali judul dan isi berita
                                            </li>
                                            <li class="mb-2">
                                                <i class="fas fa-check-circle text-success me-2"></i>
                                                Pastikan gambar mendukung konten
                                            </li>
                                            <li class="mb-0">
                                                <i class="fas fa-check-circle text-success me-2"></i>
                                                Pilih penulis yang sesuai
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mt-4">
                            <button type="submit" class="btn btn-primary btn-round btn-lg">
                                <i class="fas fa-save me-2"></i>Perbarui Berita
                            </button>
                            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary btn-round btn-lg">
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

        .bg-light {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9) !important;
        }

        .bg-warning {
            background: linear-gradient(135deg, #fef3c7, #fde68a) !important;
        }

        .bg-info {
            background: linear-gradient(135deg, #cffafe, #a5f3fc) !important;
        }

        .rounded {
            border-radius: 8px !important;
        }

        .list-unstyled li {
            padding: 2px 0;
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

            textarea.form-control-lg {
                min-height: 150px;
            }

            img {
                width: 120px !important;
                height: 80px !important;
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

            textarea.form-control-lg {
                min-height: 120px;
            }

            img {
                width: 100px !important;
                height: 70px !important;
            }
        }
    </style>
@endsection
