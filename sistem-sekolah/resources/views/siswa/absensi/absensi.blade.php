@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1"
                    style="color: #2c3e50; font-family: 'Inter', 'Segoe UI', sans-serif; font-size: 24px;">Riwayat Absensi
                </h3>
                <p class="text-muted" style="font-size: 14px; color: #7f8c8d;">Berikut adalah riwayat absensi Anda.</p>
            </div>
            <div class="d-flex align-items-center">
                <span class="badge me-2"
                    style="background: linear-gradient(135deg, #3498db, #2980b9); color: white; padding: 8px 16px; border-radius: 20px; font-size: 13px; font-weight: 500;">
                    Total: {{ count($absensi) }}
                </span>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card stat-card"
                    style="background: linear-gradient(135deg, #27ae60, #2ecc71); border: none; border-radius: 12px;">
                    <div class="card-body text-white p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="fw-bold mb-0">{{ $absensi->where('status', 'hadir')->count() }}</h4>
                                <p class="mb-0" style="font-size: 13px; opacity: 0.9;">Hadir</p>
                            </div>
                            <div class="icon-circle"
                                style="background: rgba(255,255,255,0.2); width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-check" style="font-size: 18px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card"
                    style="background: linear-gradient(135deg, #f39c12, #f1c40f); border: none; border-radius: 12px;">
                    <div class="card-body text-white p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="fw-bold mb-0">{{ $absensi->where('status', 'sakit')->count() }}</h4>
                                <p class="mb-0" style="font-size: 13px; opacity: 0.9;">Sakit</p>
                            </div>
                            <div class="icon-circle"
                                style="background: rgba(255,255,255,0.2); width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-thermometer-half" style="font-size: 18px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card"
                    style="background: linear-gradient(135deg, #3498db, #2980b9); border: none; border-radius: 12px;">
                    <div class="card-body text-white p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="fw-bold mb-0">{{ $absensi->where('status', 'izin')->count() }}</h4>
                                <p class="mb-0" style="font-size: 13px; opacity: 0.9;">Izin</p>
                            </div>
                            <div class="icon-circle"
                                style="background: rgba(255,255,255,0.2); width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-file-alt" style="font-size: 18px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card"
                    style="background: linear-gradient(135deg, #e74c3c, #c0392b); border: none; border-radius: 12px;">
                    <div class="card-body text-white p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="fw-bold mb-0">{{ $absensi->where('status', 'alpha')->count() }}</h4>
                                <p class="mb-0" style="font-size: 13px; opacity: 0.9;">Alpha</p>
                            </div>
                            <div class="icon-circle"
                                style="background: rgba(255,255,255,0.2); width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-times" style="font-size: 18px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Table Card -->
        <div class="card shadow-sm" style="border-radius: 12px; border: 1px solid #e0e0e0; overflow: hidden;">
            <div class="card-header" style="background: #f8f9fa; border-bottom: 1px solid #e0e0e0; padding: 20px 25px;">
                <h5 class="mb-0 fw-semibold" style="color: #2c3e50;">
                    <i class="fas fa-history me-2" style="color: #3498db;"></i>Daftar Riwayat Absensi
                </h5>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead style="background-color: #f8f9fa;">
                            <tr>
                                <th width="25%"
                                    style="padding: 18px 20px; font-weight: 600; color: #2c3e50; border-bottom: 1px solid #e0e0e0; font-size: 14px;">
                                    <i class="fas fa-calendar me-2" style="color: #7f8c8d;"></i>Tanggal
                                </th>
                                <th width="20%"
                                    style="padding: 18px 20px; font-weight: 600; color: #2c3e50; border-bottom: 1px solid #e0e0e0; font-size: 14px;">
                                    <i class="fas fa-info-circle me-2" style="color: #7f8c8d;"></i>Status
                                </th>
                                <th width="30%"
                                    style="padding: 18px 20px; font-weight: 600; color: #2c3e50; border-bottom: 1px solid #e0e0e0; font-size: 14px;">
                                    <i class="fas fa-camera me-2" style="color: #7f8c8d;"></i>Foto Bukti
                                </th>
                                <th width="25%"
                                    style="padding: 18px 20px; font-weight: 600; color: #2c3e50; border-bottom: 1px solid #e0e0e0; font-size: 14px;">
                                    <i class="fas fa-clock me-2" style="color: #7f8c8d;"></i>Waktu
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($absensi as $item)
                                <tr style="border-bottom: 1px solid #f0f0f0; transition: all 0.3s ease;">
                                    <td style="padding: 16px 20px; color: #2c3e50; font-weight: 500; font-size: 14px;">
                                        <div class="d-flex align-items-center">
                                            <div class="date-icon me-3"
                                                style="width: 40px; height: 40px; background: #3498db; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 14px;">
                                                {{ \Carbon\Carbon::parse($item->created_at)->format('d') }}
                                            </div>
                                            <div>
                                                <div style="font-weight: 600;">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('M Y') }}</div>
                                                <div style="font-size: 12px; color: #7f8c8d;">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('l') }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <td style="padding: 16px 20px;">
                                        @if ($item->status == 'hadir')
                                            <span class="badge status-badge"
                                                style="background: #27ae60; color: white; padding: 6px 12px; border-radius: 6px; font-size: 12px; font-weight: 500;">
                                                <i class="fas fa-check-circle me-1"></i>Hadir
                                            </span>
                                        @elseif($item->status == 'sakit')
                                            <span class="badge status-badge"
                                                style="background: #f39c12; color: white; padding: 6px 12px; border-radius: 6px; font-size: 12px; font-weight: 500;">
                                                <i class="fas fa-thermometer-half me-1"></i>Sakit
                                            </span>
                                        @elseif($item->status == 'izin')
                                            <span class="badge status-badge"
                                                style="background: #3498db; color: white; padding: 6px 12px; border-radius: 6px; font-size: 12px; font-weight: 500;">
                                                <i class="fas fa-file-alt me-1"></i>Izin
                                            </span>
                                        @else
                                            <span class="badge status-badge"
                                                style="background: #e74c3c; color: white; padding: 6px 12px; border-radius: 6px; font-size: 12px; font-weight: 500;">
                                                <i class="fas fa-times-circle me-1"></i>Alpha
                                            </span>
                                        @endif
                                    </td>

                                    <td style="padding: 16px 20px;">
                                        @if ($item->foto_bukti)
                                            <a href="{{ asset('storage/foto_absensi/' . $item->foto_bukti) }}"
                                                class="btn btn-photo"
                                                style="background: #3498db; color: white; border: none; border-radius: 6px; padding: 6px 12px; font-size: 12px; font-weight: 500; transition: all 0.3s ease;"
                                                target="_blank">
                                                <i class="fas fa-eye me-1"></i>Lihat Foto
                                            </a>
                                        @else
                                            <span class="text-muted" style="font-size: 13px;">
                                                <i class="fas fa-ban me-1"></i>Tidak ada foto
                                            </span>
                                        @endif
                                    </td>

                                    <td style="padding: 16px 20px;">
                                        <div style="color: #2c3e50; font-weight: 600; font-size: 14px;">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }}
                                        </div>
                                        <div style="font-size: 12px; color: #7f8c8d;">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('s') }} detik
                                        </div>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5" style="background-color: #f8f9fa;">
                                        <div class="empty-state">
                                            <i class="fas fa-clipboard-list"
                                                style="font-size: 48px; color: #bdc3c7; margin-bottom: 16px;"></i>
                                            <h5 style="color: #7f8c8d; font-weight: 600;">Belum ada data absensi</h5>
                                            <p class="text-muted" style="font-size: 14px;">Data absensi akan muncul
                                                setelah Anda melakukan absensi.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Card Footer -->
            <div class="card-footer"
                style="background-color: #f8f9fa; border-top: 1px solid #e0e0e0; padding: 15px 25px;">
                <div class="d-flex justify-content-between align-items-center">
                    <div style="font-size: 13px; color: #7f8c8d;">
                        Menampilkan <strong>{{ count($absensi) }}</strong> data absensi
                    </div>
                    <div style="font-size: 12px; color: #95a5a6;">
                        <i class="fas fa-sync-alt me-1"></i>Terakhir diperbarui: {{ now()->format('d M Y H:i') }}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>
        .stat-card:hover {
            transform: translateY(-3px);
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .status-badge {
            transition: all 0.3s ease;
        }

        .btn-photo:hover {
            background: #2980b9 !important;
            transform: translateY(-1px);
        }

        tr:hover {
            background-color: #f8f9fa !important;
        }

        .date-icon {
            transition: all 0.3s ease;
        }

        tr:hover .date-icon {
            transform: scale(1.05);
        }
    </style>
@endsection
