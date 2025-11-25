<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - SMK Negeri 1 Bone</title>
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
            --accent-gold: #ffc107;
            --light-gray: #f8f9fa;
            --medium-gray: #e9ecef;
            --dark-gray: #6c757d;
            --hover-blue: #002244;
        }

        body {
            font-family: "Segoe UI", system-ui, -apple-system, sans-serif;
            color: #333;
            line-height: 1.6;
            padding-top: 76px;
            overflow-x: hidden;
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
            transform: translateY(-1px);
        }

        .nav-link:hover::after {
            width: 60%;
        }

        .nav-link.active {
            color: var(--primary-blue) !important;
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

        .btn-login-custom i {
            transition: transform 0.3s ease;
            font-size: 0.95rem;
        }

        .btn-login-custom:hover i {
            transform: translateX(4px);
        }

        .btn-login-custom:active {
            transform: scale(0.97);
            box-shadow: 0 2px 8px rgba(0, 51, 102, 0.3);
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler-icon {
            filter: invert(25%);
        }

        /* ===== HERO SECTION - BACKGROUND GRADIENT ===== */
        .hero-section {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }

        .hero-content h1 {
            font-weight: 700;
            font-size: 2.8rem;
            margin-bottom: 1.5rem;
            color: var(--primary-blue);
        }

        .hero-content p {
            font-size: 1.2rem;
            color: var(--dark-gray);
            margin-bottom: 2rem;
        }

        /* ===== TOMBOL HERO DENGAN GRADIENT GOLD ===== */
        .btn-hero {
            background: linear-gradient(135deg, var(--accent-gold) 0%, #e0a800 100%);
            border: none;
            color: #333;
            font-weight: 600;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 15px rgba(255, 193, 7, 0.3);
        }

        /* ===== EFEK HOVER TOMBOL HERO ===== */
        .btn-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 193, 7, 0.4);
            background: linear-gradient(135deg, #e0a800 0%, #d39e00 100%);
        }

        .btn-hero i {
            transition: transform 0.3s ease;
        }

        .btn-hero:hover i {
            transform: translateX(5px);
        }

        /* ===== FEATURES SECTION - KARTU FITUR ===== */
        .features-section {
            padding: 5rem 0;
            background-color: white;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            color: var(--primary-blue);
            font-weight: 700;
            position: relative;
        }

        /* ===== GARIS BAWAH JUDUL SECTION ===== */
        .section-title:after {
            content: "";
            display: block;
            width: 60px;
            height: 4px;
            background-color: var(--accent-gold);
            margin: 1rem auto;
        }

        /* ===== KARTU FITUR DENGAN EFEK HOVER ===== */
        .feature-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            height: 100%;
            transition: all 0.3s ease;
            border: 1px solid var(--medium-gray);
            text-align: center;
        }

        /* ===== EFEK HOVER PADA KARTU FITUR ===== */
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        /* ===== ICON BULAT PADA KARTU FITUR ===== */
        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: rgba(0, 51, 102, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--primary-blue);
            font-size: 1.8rem;
        }

        .feature-card h3 {
            color: var(--primary-blue);
            margin-bottom: 1rem;
            font-weight: 600;
        }

        /* ===== NEWS SECTION - BACKGROUND LIGHT GRAY ===== */
        .news-section {
            padding: 5rem 0;
            background-color: var(--light-gray);
        }

        /* ===== KARTU BERITA DENGAN EFEK HOVER ===== */
        .news-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            cursor: pointer;
        }

        /* ===== EFEK HOVER PADA KARTU BERITA ===== */
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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
            font-weight: 600;
            margin-bottom: 1rem;
        }

        /* ===== STATISTIK ANGKA BESAR ===== */
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 0.5rem;
        }

        /* ===== TOMBOL PRIMARY CUSTOM ===== */
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--hover-blue) 100%);
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

        /* ===== EFEK HOVER TOMBOL PRIMARY ===== */
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 51, 102, 0.3);
            color: white;
            background: linear-gradient(135deg, var(--hover-blue) 0%, #001a33 100%);
        }

        /* ===== TOMBOL OUTLINE PRIMARY ===== */
        .btn-outline-primary-custom {
            border: 2px solid var(--primary-blue);
            color: var(--primary-blue);
            background: transparent;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        /* ===== EFEK HOVER TOMBOL OUTLINE ===== */
        .btn-outline-primary-custom:hover {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 51, 102, 0.2);
        }

        /* ===== FOOTER - BACKGROUND BIRU TUA ===== */
        .footer {
            background-color: var(--primary-blue);
            color: white;
            padding: 3rem 0 1.5rem;
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

        /* ===== EFEK HOVER SOCIAL ICONS ===== */
        .social-icons a:hover {
            background-color: var(--accent-gold);
            color: var(--primary-blue);
            transform: translateY(-3px);
        }

        /* ===== BACK TO TOP BUTTON ===== */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: var(--primary-blue);
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

        /* ===== EFEK HOVER BACK TO TOP ===== */
        .back-to-top:hover {
            background: var(--hover-blue);
            transform: translateY(-3px);
        }

        .back-to-top.show {
            opacity: 1;
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

        /* ===== EFEK HOVER PADA KARTU UMUM ===== */
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
        }

        /* ===== BADGE CUSTOM DENGAN WARNA TEMA ===== */
        .badge-custom {
            background: var(--primary-blue);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* ===== LOADING ANIMATION ===== */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--primary-blue);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loading-spinner {
            width: 60px;
            height: 60px;
            border: 5px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: var(--accent-gold);
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* ===== RESPONSIVE ADJUSTMENTS ===== */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.2rem;
            }

            .stat-number {
                font-size: 2.5rem;
            }

            .features-section,
            .news-section {
                padding: 3rem 0;
            }
        }

        /* ===== IMPROVED CARD STYLING ===== */
        .card {
            border: none;
            overflow: hidden;
        }

        /* ===== IMPROVED IMAGE STYLING ===== */
        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        /* ===== IMPROVED TEXT STYLING ===== */
        .text-shadow {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* ===== IMPROVED BUTTON STYLING ===== */
        .btn {
            font-weight: 500;
        }

        /* ===== FALLBACK IMAGE STYLING ===== */
        .fallback-image {
            background-color: var(--medium-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark-gray);
            font-size: 1.5rem;
        }

        /* ===== ANIMASI TAMBAHAN ===== */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0% {
                transform: translate(0, 0px);
            }

            50% {
                transform: translate(0, -15px);
            }

            100% {
                transform: translate(0, 0px);
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .counter {
            font-weight: 700;
            color: var(--primary-blue);
        }

        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background-color: rgba(0, 51, 102, 0.1);
            border-radius: 50%;
        }

        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0) translateX(-50%);
            }

            40% {
                transform: translateY(-20px) translateX(-50%);
            }

            60% {
                transform: translateY(-10px) translateX(-50%);
            }
        }

        .flip-in {
            animation: flipIn 1s ease-out;
        }

        @keyframes flipIn {
            0% {
                transform: perspective(400px) rotateY(90deg);
                opacity: 0;
            }

            100% {
                transform: perspective(400px) rotateY(0deg);
                opacity: 1;
            }
        }

        .zoom-in {
            animation: zoomIn 1s ease-out;
        }

        @keyframes zoomIn {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* ===== MODAL STYLING ===== */
        .modal-content {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .modal-header {
            background-color: var(--primary-blue);
            color: white;
            border-bottom: 2px solid var(--accent-gold);
        }
        
        .modal-header .btn-close {
            filter: invert(1);
        }
        
        .modal-body {
            padding: 0;
            position: relative;
        }
        
        .modal-image {
            width: 100%;
            height: auto;
            max-height: 70vh;
            object-fit: contain;
        }
        
        .modal-footer {
            background-color: var(--light-gray);
            border-top: 1px solid var(--medium-gray);
        }
        
        .image-info {
            padding: 1rem;
        }
        
        .image-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-blue);
            margin-bottom: 0.5rem;
        }
        
        .image-date {
            color: var(--dark-gray);
            font-size: 0.9rem;
        }
        
        /* ===== LOADING SPINNER ===== */
        .loading-spinner {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
        }
        
        .spinner-border {
            width: 3rem;
            height: 3rem;
            color: var(--primary-blue);
        }
    </style>
</head>

<body>

    <!-- ===== PARTICLE BACKGROUND ===== -->
    <div class="particles" id="particles"></div>

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
                    <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}"><i
                                class="fa-solid fa-house"></i> Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/profil') }}"><i
                                class="fa-solid fa-user-graduate"></i> Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/berita') }}"><i
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

    <!-- ===== HERO SECTION ===== -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Selamat Datang di SMK Negeri 1 Bone</h1>
                    <p class="lead mb-4">Mewujudkan Generasi Unggul, Berkarakter, dan Berdaya Saing Global melalui
                        pendidikan kejuruan yang berkualitas.</p>
                    <!-- ===== TOMBOL HERO DENGAN ICON ===== -->
                    <a href="{{ url('/profil') }}" class="btn btn-hero">
                        <i class="fas fa-rocket me-2"></i>Pelajari Lebih Lanjut
                    </a>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <!-- Path dengan asset() -->
                    <img src="{{ asset('storage/image/fasilitas/WhatsApp_Image_2025-11-12_at_15.36.51.jpeg') }}"
                        alt="SMK Negeri 1 Bone" class="img-fluid rounded shadow floating"
                        onerror="this.style.display='none'; document.getElementById('fallbackHero').style.display='block';">

                    <!-- Fallback jika semua gambar gagal -->
                    <div id="fallbackHero" class="img-fluid rounded shadow fallback-image floating"
                        style="height: 300px; display: none;">
                        <div class="text-center">
                            <i class="fas fa-school mb-2 d-block" style="font-size: 3rem;"></i>
                            <span>SMK Negeri 1 Bone</span>
                            <p class="mt-2 small">Gambar tidak tersedia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== PROFIL SINGKAT ===== -->
    <section class="features-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Bagian Teks Tentang Kami -->
                <div class="col-lg-6 mb-4 mb-lg-0 text-center">
                    <h2 class="section-title mb-4">Tentang Kami</h2>
                    <p class="fs-5 mb-3">SMK Negeri 1 Bone adalah lembaga pendidikan menengah kejuruan yang berkomitmen
                        untuk menghasilkan lulusan yang kompeten, berkarakter, dan siap bersaing di dunia kerja.</p>
                    <p class="mb-4">Dengan fasilitas modern dan tenaga pengajar yang berpengalaman, kami menyediakan
                        berbagai program keahlian yang relevan dengan kebutuhan industri.</p>

                    <!-- ===== TOMBOL PRIMARY CUSTOM ===== -->
                    <a href="{{ url('/profil') }}" class="btn btn-primary-custom">
                        <i class="fas fa-book me-2"></i>Baca Selengkapnya
                    </a>
                </div>

                <!-- Bagian Statistik -->
                <div class="col-lg-6">
                    <div class="row text-center">
                        <div class="col-6 mb-4">
                            <div class="stat-number counter" data-target="1500">0</div>
                            <p class="fw-medium">Siswa Aktif</p>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="stat-number counter" data-target="101">0</div>
                            <p class="fw-medium">Guru & Staff</p>
                        </div>
                        <div class="col-6">
                            <div class="stat-number counter" data-target="7">0</div>
                            <p class="fw-medium">Program Jurusan</p>
                        </div>
                        <div class="col-6">
                            <div class="stat-number counter" data-target="8">0</div>
                            <p class="fw-medium">Ekstrakurikuler</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== JURUSAN UNGGULAN ===== -->
    <section class="news-section">
        <div class="container">
            <h2 class="section-title">Program Jurusan</h2>
            <div class="row">
                <!-- DPIB -->
                <div class="col-md-6 col-lg-4 fade-in">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <h5 class="card-title">Desain Pemodelan dan Informasi Bangunan</h5>
                            <p class="card-text small">
                                Tujuan dari konsentrasi DPIB adalah menyelenggarakan sistem pendidikan teknik yang
                                berkualitas dan beretos kerja tinggi, bekerja sebagai Deafter / Juru gambar dalam
                                pekerjaan perencanaan dan pelaksanaan pembangunan, serta mampu berwirausaha di studio
                                gambar.
                            </p>
                            <span class="badge badge-custom">128 Siswa</span>
                        </div>
                    </div>
                </div>

                <!-- TJKT -->
                <div class="col-md-6 col-lg-4 fade-in">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="fas fa-network-wired"></i>
                            </div>
                            <h5 class="card-title">Teknik Jaringan Komputer dan Telekomunikasi</h5>
                            <p class="card-text small">
                                Menghasilkan peserta didik dengan keahlian komputer, jaringan, dan telekomunikasi agar
                                dapat bekerja mandiri atau di DUDI, serta mampu berkompetisi dan bersikap profesional.
                            </p>
                            <span class="badge badge-custom">309 Siswa</span>
                        </div>
                    </div>
                </div>

                <!-- MPLB -->
                <div class="col-md-6 col-lg-4 fade-in">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <h5 class="card-title">Manajemen Perkantoran dan Layanan Bisnis</h5>
                            <p class="card-text small">
                                Menghasilkan lulusan dengan keterampilan administrasi perkantoran yang profesional,
                                mandiri, dan siap berwirausaha di bidang layanan bisnis.
                            </p>
                            <span class="badge badge-custom">293 Siswa</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <!-- ===== TOMBOL OUTLINE PRIMARY ===== -->
                <a href="{{ url('/profil') }}" class="btn btn-outline-primary-custom">
                    <i class="fas fa-newspaper me-2"></i>Lihat Semua Jurusan
                </a>
            </div>
        </div>
    </section>

    <!-- ===== BERITA TERBARU ===== -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title">Berita Terbaru</h2>
            <div class="row">
                @if (isset($berita) && count($berita) > 0)
                    @foreach ($berita as $b)
                        <div class="col-md-4 mb-4 fade-in">
                            <div class="news-card zoom-in">
                                {{-- SOLUSI: Cek dan tampilkan gambar dengan fallback --}}
                                @php
                                    $imagePath = 'storage/' . $b->gambar;
                                    $imageExists = file_exists(public_path($imagePath));
                                @endphp

                                @if ($imageExists)
                                    <div class="news-image"
                                        style="background-image: url('{{ asset($imagePath) }}');">
                                    </div>
                                @else
                                    <div class="news-image fallback-image">
                                        <i class="fas fa-newspaper"></i>
                                        <div class="mt-2 small">Gambar tidak tersedia</div>
                                    </div>
                                @endif
                                <div class="news-content">
                                    <h5 class="news-title">{{ $b->judul }}</h5>
                                    <p class="card-text">{{ Str::limit($b->isi, 100) }}</p>
                                    <div class="news-date">
                                        <i class="fas fa-calendar me-1"></i>{{ $b->created_at }}
                                    </div>
                                    {{-- Tombol Baca Selengkapnya --}}
                                    <a href="{{ url('/berita/' . $b->id) }}"
                                        class="btn btn-primary-custom btn-sm mt-3">
                                        <i class="fas fa-book-reader me-2"></i>Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p class="text-muted">Tidak ada berita tersedia saat ini.</p>
                    </div>
                @endif
            </div>
            <div class="text-center mt-4">
                <!-- ===== TOMBOL OUTLINE PRIMARY ===== -->
                <a href="{{ url('/berita') }}" class="btn btn-outline-primary-custom">
                    <i class="fas fa-newspaper me-2"></i>Lihat Semua Berita
                </a>
            </div>
        </div>
    </section>

    <!-- ===== GALERI KEGIATAN ===== -->
    <section class="news-section">
        <div class="container">
            <h2 class="section-title">Galeri Kegiatan</h2>
            <div class="row">
                @if (isset($galeri) && count($galeri) > 0)
                    @foreach ($galeri as $ga)
                        <div class="col-md-4 mb-4 fade-in">
                            <div class="news-card zoom-in galeri-item" 
                                 data-bs-toggle="modal" 
                                 data-bs-target="#imageModal"
                                 data-image="{{ asset('storage/' . $ga->gambar) }}"
                                 data-title="{{ $ga->judul }}"
                                 data-date="{{ $ga->tanggal }}">
                                {{-- SOLUSI: Cek dan tampilkan gambar dengan fallback --}}
                                @php
                                    $imagePath = 'storage/' . $ga->gambar;
                                    $imageExists = file_exists(public_path($imagePath));
                                @endphp

                                @if ($imageExists)
                                    <div class="news-image"
                                        style="background-image: url('{{ asset($imagePath) }}');">
                                    </div>
                                @else
                                    <div class="news-image fallback-image">
                                        <i class="fas fa-image"></i>
                                        <div class="mt-2 small">Gambar tidak tersedia</div>
                                    </div>
                                @endif
                                <div class="news-content">
                                    <h5 class="news-title">{{ $ga->judul }}</h5>
                                    <div class="news-date">
                                        <i class="fas fa-calendar me-1"></i>{{ $ga->tanggal }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p class="text-muted">Tidak ada galeri tersedia saat ini.</p>
                    </div>
                @endif
            </div>
            <div class="text-center mt-4">
                <!-- ===== TOMBOL OUTLINE PRIMARY ===== -->
                <a href="{{ url('/galeri') }}" class="btn btn-outline-primary-custom">
                    <i class="fas fa-images me-2"></i>Lihat Galeri Lengkap
                </a>
            </div>
        </div>
    </section>

    <!-- Modal untuk menampilkan gambar detail -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Detail Gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body position-relative">
                    <div class="loading-spinner" id="modalLoading">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <img id="modalImage" class="modal-image" src="" alt="">
                </div>
                <div class="modal-footer">
                    <div class="image-info w-100">
                        <div class="image-title" id="modalTitle"></div>
                        <div class="image-date" id="modalDate"></div>
                    </div>
                </div>
            </div>
        </div>
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
                    <!-- ===== SOCIAL ICONS ===== -->
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

        // ===== PARTICLE BACKGROUND =====
        function createParticles() {
            const particlesContainer = $('#particles');
            const particleCount = 30;

            for (let i = 0; i < particleCount; i++) {
                const particle = $('<div class="particle"></div>');
                const size = Math.random() * 20 + 5;
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                const duration = Math.random() * 20 + 10;
                const delay = Math.random() * 5;

                particle.css({
                    width: size + 'px',
                    height: size + 'px',
                    left: posX + '%',
                    top: posY + '%',
                    opacity: Math.random() * 0.3 + 0.1,
                    animation: `floating ${duration}s ease-in-out ${delay}s infinite`
                });

                particlesContainer.append(particle);
            }
        }

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

            // ===== PARALLAX EFFECT =====
            const scrolled = $(window).scrollTop();
            $('.floating').css('transform', `translateY(${scrolled * 0.05}px)`);
        });

        // ===== SMOOTH SCROLLING =====
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            var target = this.hash;
            var $target = $(target);

            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - 70
            }, 1000, 'easeInOutExpo');
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

        // ===== COUNTER ANIMATION =====
        function startCounters() {
            $('.counter').each(function() {
                var $this = $(this);
                var target = parseInt($this.data('target'));
                var duration = 2000;
                var step = target / (duration / 16);
                var current = 0;

                var timer = setInterval(function() {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    $this.text(Math.floor(current));
                }, 16);
            });
        }

        // ===== HOVER EFFECTS =====
        $('.feature-card, .news-card').hover(
            function() {
                $(this).addClass('pulse');
            },
            function() {
                $(this).removeClass('pulse');
            }
        );

        // ===== SCROLL TRIGGERED ANIMATIONS =====
        $(window).scroll(function() {
            checkScroll();

            // Trigger counters when they come into view
            $('.counter').each(function() {
                var position = $(this).offset().top;
                var scroll = $(window).scrollTop();
                var windowHeight = $(window).height();

                if (position < scroll + windowHeight - 100 && $(this).text() === '0') {
                    startCounters();
                }
            });

            // Animate elements on scroll
            $('.flip-in, .zoom-in').each(function() {
                var position = $(this).offset().top;
                var scroll = $(window).scrollTop();
                var windowHeight = $(window).height();

                if (position < scroll + windowHeight - 100) {
                    $(this).css('animation-play-state', 'running');
                }
            });
        });

        // ===== BACK TO TOP ANIMATION =====
        $('.back-to-top').click(function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 1000, 'easeInOutExpo');

            // Add special effect
            $(this).addClass('pulse');
            setTimeout(() => {
                $(this).removeClass('pulse');
            }, 1000);
        });

        // ===== NAVBAR LINK ANIMATIONS =====
        $('.nav-link').hover(
            function() {
                $(this).addClass('pulse');
            },
            function() {
                $(this).removeClass('pulse');
            }
        );

        // ===== IMAGE LOAD ANIMATIONS =====
        $('img').on('load', function() {
            $(this).addClass('zoom-in');
        });

        // ===== INITIALIZE ANIMATIONS =====
        $(document).ready(function() {
            createParticles();
            checkScroll();

            // Add initial animations
            $('.navbar-brand').addClass('flip-in');
            $('.hero-content').addClass('fade-in visible');
        });

        // ===== RESPONSIVE MENU ANIMATION =====
        $('.navbar-toggler').click(function() {
            $('.navbar-collapse').slideToggle(300);
        });

        // ===== MODAL GAMBAR DETAIL =====
        var imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
        var modalImage = document.getElementById('modalImage');
        var modalTitle = document.getElementById('modalTitle');
        var modalDate = document.getElementById('modalDate');
        var modalLoading = document.getElementById('modalLoading');

        // Event listener untuk card galeri
        document.querySelectorAll('.galeri-item').forEach(card => {
            card.addEventListener('click', function() {
                const imageUrl = this.getAttribute('data-image');
                const title = this.getAttribute('data-title');
                const date = this.getAttribute('data-date');
                
                // Tampilkan loading spinner
                modalLoading.style.display = 'block';
                modalImage.style.opacity = '0';
                
                // Set data ke modal
                modalTitle.textContent = title;
                modalDate.textContent = date;
                
                // Preload gambar
                const img = new Image();
                img.onload = function() {
                    modalImage.src = imageUrl;
                    modalImage.alt = title;
                    modalLoading.style.display = 'none';
                    modalImage.style.opacity = '1';
                };
                img.src = imageUrl;
                
                // Tampilkan modal
                imageModal.show();
            });
        });

        // Reset modal saat ditutup
        document.getElementById('imageModal').addEventListener('hidden.bs.modal', function() {
            modalImage.src = '';
            modalImage.alt = '';
            modalTitle.textContent = '';
            modalDate.textContent = '';
        });
    </script>
</body>

</html>