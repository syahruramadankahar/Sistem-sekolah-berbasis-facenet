@extends('layouts.app')

@section('content')
    <div class="page-inner">

        <!-- Header Profil -->
        <div class="profile-header mb-4">
            <h3 class="fw-bold mb-2 text-primary">Profil Siswa</h3>
            <p class="text-muted">Informasi lengkap data diri siswa</p>
        </div>

        <div class="card profile-card">
            <div class="card-body p-4">

                <div class="row align-items-start">

                    {{-- FOTO SISWA --}}
                    <div class="col-md-3 text-center mb-4 mb-md-0">
                        <div class="profile-photo-container">
                            <img src="{{ $siswa->foto ? asset('storage/siswa/' . $siswa->foto) : asset('template1/assets/img/profile.jpg') }}"
                                class="profile-photo rounded-circle shadow-lg mb-3"
                                width="150" height="150"
                                style="object-fit: cover;"
                                alt="Foto Profil {{ $siswa->nama }}"
                                onerror="this.src='{{ asset('template1/assets/img/profile.jpg') }}'">
                        </div>
                        <h5 class="profile-name mt-2 fw-bold">{{ $siswa->nama }}</h5>
                        <span class="badge profile-badge">Siswa</span>

                        {{-- Status Aktif --}}
                        <div class="profile-status mt-3">
                            <i class="fas fa-circle text-success me-2 small"></i>
                            <span class="small text-muted">Status: Aktif</span>
                        </div>
                    </div>

                    {{-- DETAIL DATA --}}
                    <div class="col-md-9">
                        <div class="profile-details">
                            <h5 class="section-title mb-4">
                                <i class="fas fa-user-circle me-2 text-primary"></i>
                                Informasi Pribadi
                            </h5>

                            <div class="table-responsive">
                                <table class="table profile-table">
                                    <tr class="detail-row">
                                        <th class="detail-label" width="150">
                                            <i class="fas fa-user me-2"></i>Nama
                                        </th>
                                        <td class="detail-value">{{ $siswa->nama }}</td>
                                    </tr>
                                    <tr class="detail-row">
                                        <th class="detail-label">
                                            <i class="fas fa-envelope me-2"></i>Email
                                        </th>
                                        <td class="detail-value">{{ $siswa->user->email }}</td>
                                    </tr>
                                    <tr class="detail-row">
                                        <th class="detail-label">
                                            <i class="fas fa-id-card me-2"></i>NIS
                                        </th>
                                        <td class="detail-value">{{ $siswa->nis }}</td>
                                    </tr>
                                    <tr class="detail-row">
                                        <th class="detail-label">
                                            <i class="fas fa-school me-2"></i>Kelas
                                        </th>
                                        <td class="detail-value">{{ $siswa->kelas->nama_kelas }}</td>
                                    </tr>
                                    <tr class="detail-row">
                                        <th class="detail-label">
                                            <i class="fas fa-book-open me-2"></i>Jurusan
                                        </th>
                                        <td class="detail-value">{{ $siswa->jurusan }}</td>
                                    </tr>
                                    <tr class="detail-row">
                                        <th class="detail-label">
                                            <i class="fas fa-map-marker-alt me-2"></i>Alamat
                                        </th>
                                        <td class="detail-value">{{ $siswa->alamat }}</td>
                                    </tr>
                                </table>
                            </div>

                            {{-- Info: Tidak bisa edit --}}
                            <div class="info-alert mt-4">
                                <div class="alert-content">
                                    <i class="fas fa-info-circle me-3"></i>
                                    <div>
                                        <strong>Informasi</strong>
                                        <p class="mb-0 small">Data profil hanya dapat dilihat oleh siswa dan tidak dapat
                                            diubah.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <style>
        /* Profile Header */
        .profile-header {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            padding: 1.5rem;
            border-radius: 12px;
            border-left: 4px solid #003366;
        }

        /* Profile Card */
        .profile-card {
            border: none;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            border-radius: 16px;
            overflow: hidden;
            background: white;
            transition: transform 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
        }

        /* Profile Photo */
        .profile-photo-container {
            position: relative;
            display: inline-block;
        }

        .profile-photo {
            border: 4px solid white;
            background: linear-gradient(135deg, #003366, #004488);
        }

        .profile-name {
            color: #003366;
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }

        .profile-badge {
            background: linear-gradient(135deg, #003366, #004488);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.8rem;
        }

        .profile-status {
            background: #f8f9fa;
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
            display: inline-block;
        }

        /* Section Title */
        .section-title {
            color: #003366;
            font-weight: 600;
            font-size: 1.2rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e9ecef;
        }

        /* Profile Table */
        .profile-table {
            margin-bottom: 0;
        }

        .detail-row {
            border-bottom: 1px solid #f1f3f4;
            transition: background-color 0.3s ease;
        }

        .detail-row:hover {
            background-color: #f8f9fa;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #6c757d;
            font-weight: 600;
            font-size: 0.9rem;
            vertical-align: middle;
            padding: 1rem 0.75rem;
        }

        .detail-label i {
            color: #003366;
            width: 20px;
            text-align: center;
        }

        .detail-value {
            color: #003366;
            font-weight: 500;
            font-size: 0.95rem;
            vertical-align: middle;
            padding: 1rem 0.75rem;
        }

        /* Info Alert */
        .info-alert {
            background: linear-gradient(135deg, #d1ecf1, #bee5eb);
            border: 1px solid #b6d4fe;
            border-radius: 12px;
            padding: 1rem 1.25rem;
        }

        .alert-content {
            display: flex;
            align-items: flex-start;
        }

        .alert-content i {
            color: #0c5460;
            font-size: 1.1rem;
            margin-top: 0.1rem;
        }

        .alert-content strong {
            color: #0c5460;
            display: block;
            margin-bottom: 0.25rem;
            font-size: 0.9rem;
        }

        .alert-content p {
            color: #0c5460;
            margin-bottom: 0;
            font-size: 0.85rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .profile-header {
                padding: 1rem;
                text-align: center;
            }

            .profile-card .card-body {
                padding: 1.5rem;
            }

            .profile-photo {
                width: 120px;
                height: 120px;
            }

            .profile-name {
                font-size: 1.1rem;
            }

            .detail-label,
            .detail-value {
                padding: 0.75rem 0.5rem;
                font-size: 0.85rem;
            }

            .alert-content {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }

            .alert-content i {
                align-self: center;
            }
        }

        @media (max-width: 576px) {
            .profile-table {
                font-size: 0.9rem;
            }

            .detail-label {
                width: 120px;
            }

            .detail-label i {
                display: none;
            }
        }

        /* Animation for smooth appearance */
        .profile-card {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <script>
        // Add loading state for image
        document.addEventListener('DOMContentLoaded', function() {
            const profilePhoto = document.querySelector('.profile-photo');
            if (profilePhoto) {
                profilePhoto.addEventListener('load', function() {
                    this.style.opacity = '1';
                });

                // Set initial opacity and transition
                profilePhoto.style.opacity = '0';
                profilePhoto.style.transition = 'opacity 0.5s ease';

                // Force load if already cached
                if (profilePhoto.complete) {
                    profilePhoto.style.opacity = '1';
                }
            }
        });
    </script>
@endsection
