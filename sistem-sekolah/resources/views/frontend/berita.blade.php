<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - SMK Negeri 1 Bone</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* ===== VARIABEL WARNA TEMA EDU SYS PRO ===== */
        :root {
            --primary-blue: #003366;
            /* Biru Navy */
            --accent-gold: #ffc107;
            --light-gray: #f8f9fa;
            --medium-gray: #e9ecef;
            --dark-gray: #6c757d;
            --hover-blue: #002244;
            /* Biru Navy lebih gelap */
        }

        body {
            font-family: "Segoe UI", system-ui, -apple-system, sans-serif;
            color: #333;
            line-height: 1.6;
            background-color: var(--light-gray);
            padding-top: 76px;
        }

        /* ===== NAVBAR STYLING - TEMA EDU SYS PRO ===== */
        .navbar {
            background-color: #fff !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            padding: 1rem 0;
        }

        .navbar.scrolled {
            background-color: rgba(255, 255, 255, 0.97) !important;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(6px);
            padding: 0.7rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-blue) !important;
            /* Biru Navy */
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        /* Nav Links */
        .nav-link {
            position: relative;
            color: #444 !important;
            font-weight: 500;
            margin: 0 0.6rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--accent-gold);
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-blue) !important;
            /* Biru Navy */
            transform: translateY(-1px);
        }

        .nav-link:hover::after {
            width: 60%;
        }

        .nav-link.active {
            color: var(--primary-blue) !important;
            /* Biru Navy */
            font-weight: 600;
        }

        .nav-link.active::after {
            width: 80%;
            background: linear-gradient(90deg, var(--accent-gold), #ffe58a);
        }

        /* Tombol Login */
        .btn-login-custom {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--hover-blue) 100%);
            /* Biru Navy */
            color: #fff !important;
            font-weight: 600;
            border: none;
            border-radius: 50px;
            padding: 0.6rem 1.5rem;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 51, 102, 0.3);
            transition: all 0.4s ease;
        }

        .btn-login-custom::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transition: left 0.6s ease;
        }

        .btn-login-custom:hover::before {
            left: 100%;
        }

        .btn-login-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0, 51, 102, 0.4);
        }

        /* ===== PAGE HEADER - BACKGROUND GRADIENT ===== */
        .page-header {
            background: linear-gradient(135deg, rgba(0, 51, 102, 0.9) 0%, rgba(0, 34, 68, 0.9) 100%),
                /* Biru Navy */
                url('storage/image/fasilitas/newseducation.jpg') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
        }

        .page-header h1 {
            font-weight: 700;
            font-size: 2.8rem;
            margin-bottom: 1rem;
            color: white;
        }

        .page-header p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0;
        }

        /* ===== BREADCRUMB STYLING ===== */
        .breadcrumb-custom {
            background: transparent;
            padding: 1rem 0;
            margin-bottom: 2rem;
        }

        .breadcrumb-custom .breadcrumb-item a {
            color: var(--primary-blue);
            /* Biru Navy */
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-custom .breadcrumb-item a:hover {
            color: var(--hover-blue);
            /* Biru Navy lebih gelap */
        }

        .breadcrumb-custom .breadcrumb-item.active {
            color: var(--dark-gray);
        }

        /* ===== NEWS CARD STYLING ===== */
        .news-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid var(--medium-gray);
        }

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .news-image {
            height: 200px;
            background-size: cover;
            background-position: center;
            transition: transform 0.5s ease;
        }

        .news-card:hover .news-image {
            transform: scale(1.05);
        }

        .news-content {
            padding: 1.5rem;
        }

        .news-date {
            color: var(--dark-gray);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .news-title {
            color: var(--primary-blue);
            /* Biru Navy */
            font-weight: 600;
            margin-bottom: 1rem;
        }

        /* ===== DETAIL BERITA STYLING ===== */
        .detail-card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--medium-gray);
            overflow: hidden;
            margin-bottom: 3rem;
        }

        .detail-header {
            padding: 2.5rem 2.5rem 1rem;
            border-bottom: 1px solid var(--medium-gray);
        }

        .detail-meta {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--dark-gray);
            font-size: 0.9rem;
        }

        .meta-item i {
            color: var(--primary-blue);
            /* Biru Navy */
        }

        .detail-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            display: block;
        }

        .detail-content {
            padding: 2.5rem;
            line-height: 1.8;
        }

        .detail-content h2,
        .detail-content h3,
        .detail-content h4 {
            color: var(--primary-blue);
            /* Biru Navy */
            margin: 2rem 0 1rem;
        }

        .detail-content p {
            margin-bottom: 1.5rem;
            text-align: justify;
        }

        .detail-content ul,
        .detail-content ol {
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }

        .detail-content li {
            margin-bottom: 0.5rem;
        }

        .detail-footer {
            padding: 1.5rem 2.5rem;
            background: var(--light-gray);
            border-top: 1px solid var(--medium-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .share-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .share-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-blue);
            /* Biru Navy */
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .share-btn:hover {
            background: var(--hover-blue);
            /* Biru Navy lebih gelap */
            transform: translateY(-2px);
        }

        /* ===== SIDEBAR STYLING ===== */
        .sidebar-widget {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--medium-gray);
        }

        .sidebar-title {
            color: var(--primary-blue);
            /* Biru Navy */
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--accent-gold);
        }

        .recent-news-item {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--medium-gray);
        }

        .recent-news-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .recent-news-image {
            width: 80px;
            height: 60px;
            border-radius: 6px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .recent-news-content h6 {
            margin-bottom: 0.25rem;
            line-height: 1.3;
        }

        .recent-news-content h6 a {
            color: var(--primary-blue);
            /* Biru Navy */
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .recent-news-content h6 a:hover {
            color: var(--hover-blue);
            /* Biru Navy lebih gelap */
        }

        .recent-news-date {
            font-size: 0.8rem;
            color: var(--dark-gray);
        }

        /* ===== TOMBOL PRIMARY CUSTOM ===== */
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--hover-blue) 100%);
            /* Biru Navy */
            border: none;
            color: white;
            padding: 0.7rem 1.8rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 15px rgba(0, 51, 102, 0.2);
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 51, 102, 0.3);
            color: white;
        }

        /* ===== TOMBOL OUTLINE PRIMARY ===== */
        .btn-outline-primary-custom {
            border: 2px solid var(--primary-blue);
            /* Biru Navy */
            color: var(--primary-blue);
            /* Biru Navy */
            background: transparent;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-outline-primary-custom:hover {
            background: var(--primary-blue);
            /* Biru Navy */
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 51, 102, 0.2);
        }

        /* ===== ANIMASI FADE IN PADA SCROLL ===== */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s, transform 0.8s;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ===== FOOTER - BACKGROUND BIRU TUA ===== */
        .footer {
            background-color: var(--primary-blue);
            /* Biru Navy */
            color: white;
            padding: 3rem 0 1.5rem;
            margin-top: 4rem;
        }

        .footer h4,
        .footer h5 {
            color: var(--accent-gold);
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        .footer a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
            margin-top: 2rem;
            text-align: center;
        }

        /* ===== SOCIAL ICONS DENGAN EFEK HOVER ===== */
        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            margin-right: 0.5rem;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            background-color: var(--accent-gold);
            color: var(--primary-blue);
            /* Biru Navy */
            transform: translateY(-3px);
        }

        /* ===== BACK TO TOP BUTTON ===== */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: var(--primary-blue);
            /* Biru Navy */
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(0, 51, 102, 0.3);
        }

        .back-to-top:hover {
            background: var(--hover-blue);
            /* Biru Navy lebih gelap */
            transform: translateY(-3px);
        }

        .back-to-top.show {
            opacity: 1;
        }

        /* ===== PAGINATION STYLING ===== */
        .pagination .page-link {
            color: var(--primary-blue);
            /* Biru Navy */
            border: 1px solid var(--medium-gray);
            margin: 0 0.2rem;
            border-radius: 6px;
            font-weight: 500;
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--hover-blue) 100%);
            /* Biru Navy */
            border-color: var(--primary-blue);
            /* Biru Navy */
        }

        .pagination .page-link:hover {
            background-color: var(--light-gray);
            color: var(--hover-blue);
            /* Biru Navy lebih gelap */
        }

        /* ===== RESPONSIVE ADJUSTMENTS ===== */
        @media (max-width: 768px) {
            .page-header {
                padding: 4rem 0;
            }

            .page-header h1 {
                font-size: 2.2rem;
            }

            .detail-image {
                height: 300px;
            }

            .detail-header,
            .detail-content {
                padding: 1.5rem;
            }

            .detail-footer {
                padding: 1rem 1.5rem;
            }

            .detail-meta {
                gap: 1rem;
            }
        }

        /* ===== TEXT COLOR FIXES ===== */
        .text-primary {
            color: var(--primary-blue) !important;
            /* Biru Navy */
        }

        .fw-bold.text-primary {
            color: var(--primary-blue) !important;
            /* Biru Navy */
        }

        .fw-semibold.text-primary {
            color: var(--primary-blue) !important;
            /* Biru Navy */
        }

        .btn-primary {
            background-color: var(--primary-blue) !important;
            /* Biru Navy */
            border-color: var(--primary-blue) !important;
            /* Biru Navy */
        }

        .btn-primary:hover {
            background-color: var(--hover-blue) !important;
            /* Biru Navy lebih gelap */
            border-color: var(--hover-blue) !important;
            /* Biru Navy lebih gelap */
        }

        .btn-outline-primary {
            color: var(--primary-blue) !important;
            /* Biru Navy */
            border-color: var(--primary-blue) !important;
            /* Biru Navy */
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-blue) !important;
            /* Biru Navy */
            border-color: var(--primary-blue) !important;
            /* Biru Navy */
        }
    </style>
</head>

<body>
    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('storage/image/fasilitas/LOGO SMKN 1 BONE-Photoroom.png') }}" alt="Logo SMK"
                    height="35" class="me-2">SMK Negeri 1 Bone
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"><i
                                class="fa-solid fa-house"></i> Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/profil') }}"><i
                                class="fa-solid fa-user-graduate"></i> Profil</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ url('/berita') }}"><i
                                class="fa-solid fa-newspaper"></i> Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/galeri') }}"><i
                                class="fa-solid fa-images"></i> Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}"><i
                                class="fa-solid fa-phone"></i> Kontak</a></li>
                    <li class="nav-item">
                        <a class="nav-link btn-login-custom" href="{{ url('/login') }}">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== PAGE HEADER ===== -->
    <section class="page-header">
        <div class="container">
            <h1 class="fw-bold">Berita Sekolah</h1>
            <p class="mb-0">Informasi terbaru seputar SMK Negeri 1 Bone</p>
        </div>
    </section>

    <div class="container my-5">

        {{-- ===========================
             MODE DETAIL BERITA
        ============================ --}}
        @isset($selectedBerita)

            <!-- Breadcrumb -->
            <nav>
                <ol class="breadcrumb bg-transparent px-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/berita') }}">Berita</a></li>
                    <li class="breadcrumb-item active">{{ Str::limit($selectedBerita->judul, 60) }}</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-lg-8">

                    <div class="detail-card p-4">

                        <h1 class="fw-bold text-primary">{{ $selectedBerita->judul }}</h1>

                        <!-- META SESUAI DATABASE -->
                        <div class="detail-meta mt-3">

                            <div>
                                <i class="far fa-calendar"></i>
                                {{ $selectedBerita->created_at->translatedFormat('d F Y') }}
                            </div>

                            <div>
                                <i class="far fa-clock"></i>
                                {{ $selectedBerita->created_at->translatedFormat('H:i') }} WITA
                            </div>

                            <div>
                                <i class="far fa-user"></i>
                                {{ $selectedBerita->penulis->name ?? 'Penulis #' . $selectedBerita->penulis_id }}
                            </div>

                            <div>
                                <i class="far fa-edit"></i>
                                Diperbarui: {{ $selectedBerita->updated_at->diffForHumans() }}
                            </div>

                        </div>

                        <!-- GAMBAR -->
                        @if ($selectedBerita->gambar)
                            <img src="{{ asset('storage/' . $selectedBerita->gambar) }}" class="detail-image my-3">
                        @else
                            <div class="detail-image bg-light d-flex align-items-center justify-content-center text-muted">
                                <i class="fas fa-image fa-3x"></i>
                            </div>
                        @endif

                        <!-- ISI BERITA -->
                        <div class="mt-4" style="line-height:1.8;">
                            {!! nl2br(e($selectedBerita->isi)) !!}
                        </div>

                        <a href="{{ url('/berita') }}" class="btn btn-outline-primary mt-4">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>

                    </div>
                </div>

                <!-- =====================
                                                                 SIDEBAR
                                                            ======================== -->
                <div class="col-lg-4">

                    <!-- BERITA TERKINI -->
                    <div class="card border-0 shadow-sm p-3 mb-4">
                        <h5 class="fw-bold text-primary mb-3"><i class="fas fa-fire"></i> Berita Terkini</h5>

                        @foreach ($berita as $recent)
                            <div class="d-flex mb-3 border-bottom pb-2">
                                <div>
                                    @if ($recent->gambar)
                                        <img src="{{ asset('storage/' . $recent->gambar) }}" width="80" height="60"
                                            class="rounded" style="object-fit:cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                            style="width:80px;height:60px;">
                                            <i class="fas fa-newspaper text-muted"></i>
                                        </div>
                                    @endif
                                </div>

                                <div class="ms-3">
                                    <a href="{{ url('/berita/' . $recent->id) }}" class="fw-semibold text-primary d-block">
                                        {{ Str::limit($recent->judul, 45) }}
                                    </a>

                                    <small class="text-muted">
                                        <i class="far fa-calendar"></i> {{ $recent->created_at->format('d M Y') }}
                                    </small>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- BERITA TERKAIT -->
                    <div class="card border-0 shadow-sm p-3 mb-4">
                        <h5 class="fw-bold text-primary mb-3"><i class="fas fa-link"></i> Berita Terkait</h5>

                        @forelse($related as $rel)
                            <div class="d-flex mb-3 border-bottom pb-2">
                                <div>
                                    @if ($rel->gambar)
                                        <img src="{{ asset('storage/' . $rel->gambar) }}" width="80" height="60"
                                            class="rounded" style="object-fit:cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                            style="width:80px;height:60px;">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </div>

                                <div class="ms-3">
                                    <a href="{{ url('/berita/' . $rel->id) }}" class="fw-semibold text-primary d-block">
                                        {{ Str::limit($rel->judul, 45) }}
                                    </a>

                                    <small class="text-muted">
                                        <i class="far fa-calendar"></i> {{ $rel->created_at->format('d M Y') }}
                                    </small>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">Belum ada berita terkait.</p>
                        @endforelse
                    </div>

                </div>
            </div>

        @endisset

        {{-- ===========================
             LIST BERITA DEFAULT
        ============================ --}}
        @if (!isset($selectedBerita))

            <div class="row">

                @foreach ($berita as $b)
                    <div class="col-md-4 mb-4">
                        <div class="news-card">
                            <div class="news-image"
                                style="background-image:url('{{ $b->gambar ? asset('storage/' . $b->gambar) : 'https://via.placeholder.com/300x200' }}');">
                            </div>

                            <div class="p-3">
                                <h5 class="text-primary">{{ $b->judul }}</h5>
                                <p class="text-muted small">{{ Str::limit($b->isi, 120) }}</p>

                                <small class="text-muted d-block mb-3">
                                    <i class="far fa-calendar"></i> {{ $b->created_at->format('d M Y') }}
                                </small>

                                <a href="{{ url('/berita/' . $b->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-book-reader"></i> Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            @if ($berita->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $berita->links() }}
                </div>
            @endif

        @endif

    </div>

    <!-- ===== FOOTER ===== -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h4 class="mb-3">
                        <i class="fas fa-graduation-cap me-2"></i>SMK Negeri 1 Bone
                    </h4>
                    <p class="mb-4">Mewujudkan Generasi Unggul, Berkarakter, dan Berdaya Saing Global.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="mb-3">Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/') }}">Beranda</a></li>
                        <li class="mb-2"><a href="{{ url('/profil') }}">Profil</a></li>
                        <li class="mb-2"><a href="{{ url('/berita') }}">Berita</a></li>
                        <li class="mb-2"><a href="{{ url('/galeri') }}">Galeri</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-3">Program Keahlian</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">Desain Pemodelan dan Informasi Bangunan</li>
                        <li class="mb-2">Teknik Jaringan Komputer dan Telekomunikasi</li>
                        <li class="mb-2">Tata Busana</li>
                        <li class="mb-2">Kuliner</li>
                        <li class="mb-2">Akuntansi Keuangan Lembaga</li>
                        <li class="mb-2">Manajemen Perkantoran dan Layanan Bisnis</li>
                        <li class="mb-2">Pemasaran</li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-3">Kontak</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Jl. Lapawawoi Kr.Sigeri
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-phone me-2"></i>
                            (0481) 21114
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-envelope me-2"></i>
                            info@smknegeri1bone.sch.id
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2025 SMK Negeri 1 Bone. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-white text-decoration-none me-3">Kebijakan Privasi</a>
                    <a href="#" class="text-white text-decoration-none">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- ===== BACK TO TOP BUTTON ===== -->
    <a href="#" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </a>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // ===== INISIALISASI AOS (ANIMATE ON SCROLL) =====
        AOS.init({
            duration: 800,
            easing: "ease-in-out",
            once: true,
            offset: 100,
        });

        // ===== EFEK SCROLL PADA NAVBAR =====
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('.navbar').addClass('scrolled');
            } else {
                $('.navbar').removeClass('scrolled');
            }

            // ===== TOGGLE BACK TO TOP BUTTON =====
            if ($(this).scrollTop() > 300) {
                $('.back-to-top').addClass('show');
            } else {
                $('.back-to-top').removeClass('show');
            }
        });

        // ===== SMOOTH SCROLLING =====
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            var target = this.hash;
            var $target = $(target);
            $('html, body').animate({
                'scrollTop': $target.offset().top - 70
            }, 800);
        });

        // ===== ANIMASI FADE IN PADA SCROLL =====
        function checkScroll() {
            $('.fade-in').each(function() {
                var position = $(this).offset().top;
                var scroll = $(window).scrollTop();
                var windowHeight = $(window).height();

                if (position < scroll + windowHeight - 100) {
                    $(this).addClass('visible');
                }
            });
        }

        checkScroll();
        $(window).scroll(checkScroll);

        // ===== BACK TO TOP FUNCTIONALITY =====
        $('.back-to-top').on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 800);
        });

        // ===== SHARE BUTTON FUNCTIONALITY =====
        $('.share-btn').on('click', function(e) {
            e.preventDefault();
            const url = window.location.href;
            const title = document.title;
            const platform = $(this).find('i').attr('class').split(' ')[1];

            let shareUrl = '';

            switch (platform) {
                case 'fa-facebook-f':
                    shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
                    break;
                case 'fa-twitter':
                    shareUrl =
                        `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`;
                    break;
                case 'fa-whatsapp':
                    shareUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(title + ' ' + url)}`;
                    break;
                case 'fa-telegram':
                    shareUrl =
                        `https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`;
                    break;
            }

            if (shareUrl) {
                window.open(shareUrl, '_blank', 'width=600,height=400');
            }
        });
    </script>
</body>

</html>
