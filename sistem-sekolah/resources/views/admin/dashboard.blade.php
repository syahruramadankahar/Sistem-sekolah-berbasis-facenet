@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <style>
        :root {
            --primary: #4361ee;
            --success: #06d6a0;
            --info: #118ab2;
            --warning: #ff9e00;
            --purple: #7209b7;
            --gradient-primary: linear-gradient(135deg, #4361ee, #3a0ca3);
            --gradient-success: linear-gradient(135deg, #06d6a0, #04a380);
            --gradient-info: linear-gradient(135deg, #118ab2, #0d6e8c);
            --gradient-warning: linear-gradient(135deg, #ff9e00, #ff9100);
            --gradient-purple: linear-gradient(135deg, #7209b7, #560bad);
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .dashboard-wrapper {
            padding: 2rem 0;
            min-height: calc(100vh - 120px);
        }

        .dashboard-header {
            background: var(--gradient-primary);
            color: white;
            padding: 2.5rem 0;
            border-radius: 20px;
            margin-bottom: 2.5rem;
            box-shadow: var(--shadow);
            margin-left: 0.5rem;
            margin-right: 0.5rem;
        }

        .welcome-text {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .welcome-subtext {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 0;
            font-weight: 400;
        }

        .date-badge {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            padding: 0.7rem 1.2rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
        }

        .stats-grid {
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 2rem 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            border: none;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
        }

        .stat-card-primary::before {
            background: var(--primary);
        }

        .stat-card-success::before {
            background: var(--success);
        }

        .stat-card-info::before {
            background: var(--info);
        }

        .stat-card-warning::before {
            background: var(--warning);
        }

        .stat-card-purple::before {
            background: var(--purple);
        }

        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .stat-title {
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0;
            line-height: 1.2;
        }

        .action-section {
            background: white;
            border-radius: 18px;
            padding: 2.5rem;
            margin-top: 2rem;
            box-shadow: var(--shadow);
            width: 100%;
        }

        .section-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: var(--primary);
            display: flex;
            align-items: center;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f8f9fa;
            text-align: center;
            justify-content: center;
        }

        .section-title i {
            margin-right: 12px;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 1.5rem;
        }

        .btn-modern {
            border-radius: 12px;
            padding: 1.2rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0.5rem;
            font-size: 0.95rem;
            text-decoration: none;
            min-height: 70px;
            flex: 1;
        }

        .btn-modern i {
            margin-right: 10px;
            font-size: 1.3rem;
        }

        .btn-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .btn-primary-modern {
            background: var(--gradient-primary);
            color: white;
        }

        .btn-success-modern {
            background: var(--gradient-success);
            color: white;
        }

        .btn-info-modern {
            background: var(--gradient-info);
            color: white;
        }

        .btn-warning-modern {
            background: var(--gradient-warning);
            color: white;
        }

        .btn-purple-modern {
            background: var(--gradient-purple);
            color: white;
        }

        .quick-actions {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-between;
            gap: 1rem;
            align-items: stretch;
            width: 100%;
        }

        .quick-actions .btn-modern {
            flex: 1;
            min-width: 0;
            padding: 1.2rem 0.8rem;
            font-size: 0.9rem;
        }

        /* Animasi untuk loading */
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

        .stat-card,
        .action-section {
            animation: fadeInUp 0.5s ease-out;
        }

        /* Custom column untuk 4 card dalam satu baris */
        .col-xl-3 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        @media (min-width: 1200px) {
            .col-xl-3 {
                flex: 0 0 25%;
                max-width: 25%;
            }

            .quick-actions .btn-modern {
                font-size: 1rem;
                padding: 1.2rem 1rem;
            }
        }

        @media (max-width: 1199px) and (min-width: 768px) {
            .col-xl-3 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

        @media (max-width: 767px) {
            .col-xl-3 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        @media (max-width: 1200px) {
            .btn-modern {
                padding: 1rem 1.2rem;
            }
        }

        @media (max-width: 992px) {
            .quick-actions {
                flex-wrap: wrap;
                justify-content: center;
            }

            .quick-actions .btn-modern {
                flex: 0 0 calc(50% - 1rem);
                min-width: 160px;
                margin: 0.5rem;
            }
        }

        @media (max-width: 768px) {
            .dashboard-wrapper {
                padding: 1.5rem 0;
            }

            .dashboard-header {
                padding: 2rem 0;
                margin-bottom: 2rem;
                border-radius: 16px;
                margin-left: 0.25rem;
                margin-right: 0.25rem;
            }

            .welcome-text {
                font-size: 1.5rem;
            }

            .quick-actions {
                flex-direction: row;
                flex-wrap: wrap;
                gap: 0.75rem;
            }

            .quick-actions .btn-modern {
                flex: 0 0 calc(50% - 0.75rem);
                min-width: 140px;
                margin: 0.25rem;
                padding: 1rem 0.5rem;
            }

            .stat-card {
                padding: 1.5rem 1.2rem;
                margin-bottom: 1rem;
            }

            .action-section {
                padding: 2rem 1.5rem;
                margin-top: 1.5rem;
            }

            .section-title {
                font-size: 1.2rem;
                margin-bottom: 1.5rem;
            }

            .date-badge {
                margin-top: 1rem;
                padding: 0.6rem 1rem;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 576px) {
            .dashboard-wrapper {
                padding: 1rem 0;
            }

            .dashboard-header {
                padding: 1.5rem 0;
                margin-bottom: 1.5rem;
                margin-left: 0.15rem;
                margin-right: 0.15rem;
            }

            .welcome-text {
                font-size: 1.3rem;
            }

            .stat-value {
                font-size: 1.8rem;
            }

            .stat-icon {
                font-size: 2.2rem;
            }

            .action-section {
                padding: 1.5rem 1rem;
                margin-top: 1rem;
            }

            .section-title {
                font-size: 1.1rem;
                margin-bottom: 1.2rem;
            }

            .date-badge {
                padding: 0.5rem 0.8rem;
                font-size: 0.75rem;
            }

            .stat-card {
                padding: 1.2rem 1rem;
            }

            .quick-actions {
                flex-direction: column;
                gap: 0.5rem;
            }

            .quick-actions .btn-modern {
                width: 100%;
                flex: none;
                margin: 0.25rem 0;
                min-height: 65px;
            }

            .btn-modern i {
                font-size: 1.2rem;
                margin-right: 8px;
            }
        }

        /* Konsistensi tinggi card */
        .stat-card {
            min-height: 180px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Perbaikan layout untuk tombol yang lebih proporsional */
        .action-container {
            width: 100%;
            max-width: 100%;
        }

        .quick-actions-wrapper {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .quick-actions {
            max-width: 1000px;
            width: 100%;
        }
    </style>

    <div class="dashboard-wrapper">
        <div class="dashboard-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h1 class="welcome-text">👋 Selamat Datang, {{ Auth::user()->name }}</h1>
                        <p class="welcome-subtext">Kelola sistem sekolah dengan mudah dan efisien</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <div class="date-badge">
                            <i class="fas fa-calendar-alt me-2"></i>
                            <span id="current-date"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="stats-grid">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="stat-card stat-card-primary">
                            <div class="stat-icon text-primary">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-title">Total Siswa</div>
                            <div class="stat-value text-primary">{{ $total_siswa }}</div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="stat-card stat-card-success">
                            <div class="stat-icon text-success">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <div class="stat-title">Total Kelas</div>
                            <div class="stat-value text-success">{{ $total_kelas }}</div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="stat-card stat-card-warning">
                            <div class="stat-icon text-warning">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="stat-title">Total Berita</div>
                            <div class="stat-value text-warning">{{ $total_berita }}</div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="stat-card stat-card-purple">
                            <div class="stat-icon text-purple">
                                <i class="fas fa-images"></i>
                            </div>
                            <div class="stat-title">Total Galeri</div>
                            <div class="stat-value text-purple">{{ $total_galeri }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="action-section">
                <div class="action-container">
                    <h3 class="section-title">
                        <i class="fas fa-cogs"></i> Kelola Sistem
                    </h3>
                    <div class="quick-actions-wrapper">
                        <div class="quick-actions">
                            <a href="{{ route('admin.siswa.index') }}" class="btn btn-primary-modern btn-modern">
                                <i class="fas fa-user-graduate"></i> Kelola Siswa
                            </a>
                            <a href="{{ route('admin.kelas.index') }}" class="btn btn-success-modern btn-modern">
                                <i class="fas fa-chalkboard"></i> Kelola Kelas
                            </a>
                            <a href="{{ route('admin.berita.index') }}" class="btn btn-warning-modern btn-modern">
                                <i class="fas fa-newspaper"></i> Kelola Berita
                            </a>
                            <a href="{{ route('admin.galeri.index') }}" class="btn btn-purple-modern btn-modern">
                                <i class="fas fa-images"></i> Kelola Galeri
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Menampilkan tanggal saat ini dengan format lebih pendek
        const now = new Date();
        const options = {
            weekday: 'short',
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        };
        document.getElementById('current-date').textContent = now.toLocaleDateString('id-ID', options);
    </script>

@endsection
