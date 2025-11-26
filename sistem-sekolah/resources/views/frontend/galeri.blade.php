<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - SMK Negeri 1 Bone</title>
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

        /* ===== PAGE HEADER ===== */
        .page-header {
            background: linear-gradient(rgba(0, 51, 102, 0.8), rgba(0, 34, 68, 0.8)), url('{{ asset('storage/image/fasilitas/kegiatansekolah.jpg') }}') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 120px 0 60px;
            text-align: center;
        }

        /* ===== SECTION TITLE ===== */
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            color: var(--primary-blue);
            font-weight: 700;
            position: relative;
        }

        .section-title:after {
            content: "";
            display: block;
            width: 60px;
            height: 4px;
            background-color: var(--accent-gold);
            margin: 1rem auto;
        }

        /* ===== CARD STYLING ===== */
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
        }

        /* ===== FEATURES SECTION ===== */
        .features-section {
            padding: 5rem 0;
            background-color: white;
        }

        /* ===== BADGE CUSTOM ===== */
        .badge-custom {
            background: var(--primary-blue);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* ===== ANIMASI FADE IN ===== */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s, transform 0.8s;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
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

        .btn-outline-primary-custom:hover,
        .btn-outline-primary-custom.active {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 51, 102, 0.2);
        }

        /* ===== FOOTER ===== */
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

        /* ===== SOCIAL ICONS ===== */
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

        .back-to-top:hover {
            background: var(--hover-blue);
            transform: translateY(-3px);
        }

        .back-to-top.show {
            opacity: 1;
        }

        .galeri-item {
            transition: transform 0.3s ease;
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
                    <li class="nav-item"><a class="nav-link" href="{{ url('/berita') }}"><i
                                class="fa-solid fa-newspaper"></i> Berita</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ url('/galeri') }}"><i
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

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="display-4 fw-bold">Galeri Kegiatan</h1>
            <p class="lead">Kumpulan momen berharga di SMK Negeri 1 Bone</p>
        </div>
    </section>

    <!-- Galeri Section -->
    <section class="features-section">
        <div class="container">

            <!-- Galeri Grid -->
            <div class="row" id="galeri-grid">
                @foreach ($galeri as $ga)
                    <div class="col-lg-4 col-md-6 mb-4 fade-in galeri-item" data-category="kegiatan">
                        <div class="card border-0 shadow-sm card-hover h-100" data-bs-toggle="modal"
                            data-bs-target="#imageModal" data-image="{{ asset('storage/' . $ga->gambar) }}"
                            data-title="{{ $ga->judul }}" data-date="{{ $ga->tanggal }}">
                            <!-- Gambar dengan rasio tetap menggunakan Bootstrap -->
                            <div class="ratio ratio-4x3">
                                <img src="{{ asset('storage/' . $ga->gambar) }}" class="card-img-top object-fit-cover"
                                    alt="{{ $ga->judul }}">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $ga->judul }}</h5>
                                <small class="text-muted mt-auto">{{ $ga->tanggal }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
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

    <!-- Footer -->
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

    <!-- Back to Top Button -->
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
        // ===== INISIALISASI AOS =====
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

        // ===== GALERI FILTER =====
        $('[data-filter]').click(function() {
            var filter = $(this).data('filter');

            // Update active button
            $('[data-filter]').removeClass('active');
            $(this).addClass('active');

            // Filter items
            if (filter === 'all') {
                $('.galeri-item').show();
            } else {
                $('.galeri-item').hide();
                $('.galeri-item[data-category="' + filter + '"]').show();
            }
        });

        // ===== MODAL GAMBAR DETAIL =====
        var imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
        var modalImage = document.getElementById('modalImage');
        var modalTitle = document.getElementById('modalTitle');
        var modalDate = document.getElementById('modalDate');
        var modalLoading = document.getElementById('modalLoading');

        // Event listener untuk card galeri
        document.querySelectorAll('.card-hover').forEach(card => {
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
