<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - SMK Negeri 1 Bone</title>
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
            background: linear-gradient(rgba(0, 51, 102, 0.8), rgba(0, 34, 68, 0.8)), url('storage/image/fasilitas/Gemini_Generated_Image_jtjetsjtjetsjtje.png') no-repeat center center;
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

        /* ===== FEATURE ICON ===== */
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

        /* ===== CONTACT ICON ===== */
        .contact-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
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

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 51, 102, 0.3);
            color: white;
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
                    <li class="nav-item"><a class="nav-link" href="{{ url('/galeri') }}"><i
                                class="fa-solid fa-images"></i> Galeri</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ url('/kontak') }}"><i
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
            <h1 class="display-4 fw-bold">Kontak Kami</h1>
            <p class="lead">Hubungi kami untuk informasi lebih lanjut</p>
        </div>
    </section>

    <!-- Kontak Section -->
    <section class="features-section">
        <div class="container">
            <div class="row">
                <!-- Informasi Kontak -->
                <div class="col-lg-4 mb-5">
                    <h2 class="section-title mb-4">Informasi Kontak</h2>

                    <div class="d-flex mb-4 fade-in">
                        <div class="flex-shrink-0">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt text-white fa-2x"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5>Alamat</h5>
                            <p>Jl. Lapawawoi Kr.Sigeri<br>Bone, Sulawesi Selatan</p>
                        </div>
                    </div>

                    <div class="d-flex mb-4 fade-in">
                        <div class="flex-shrink-0">
                            <div class="contact-icon">
                                <i class="fas fa-phone text-white fa-2x"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5>Telepon</h5>
                            <p>(0481) 21114<br>+62 81234567890</p>
                        </div>
                    </div>

                    <div class="d-flex mb-4 fade-in">
                        <div class="flex-shrink-0">
                            <div class="contact-icon">
                                <i class="fas fa-envelope text-white fa-2x"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5>Email</h5>
                            <p>info@smknegeri1bone.sch.id<br>admin@smknegeri1bone.sch.id</p>
                        </div>
                    </div>

                    <div class="d-flex fade-in">
                        <div class="flex-shrink-0">
                            <div class="contact-icon">
                                <i class="fas fa-clock text-white fa-2x"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5>Jam Operasional</h5>
                            <p>Senin - Jumat: 07:00 - 16:00<br>Sabtu: 07:00 - 12:00</p>
                        </div>
                    </div>
                </div>

                <!-- Form Kontak -->
                <div class="col-lg-8">
                    <h2 class="section-title mb-4">Kirim Pesan</h2>
                    <div class="card border-0 shadow-sm card-hover">
                        <div class="card-body p-4">
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3 fade-in">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="name" required>
                                    </div>
                                    <div class="col-md-6 mb-3 fade-in">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                </div>
                                <div class="mb-3 fade-in">
                                    <label for="subject" class="form-label">Subjek</label>
                                    <input type="text" class="form-control" id="subject" required>
                                </div>
                                <div class="mb-3 fade-in">
                                    <label for="message" class="form-label">Pesan</label>
                                    <textarea class="form-control" id="message" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary-custom fade-in">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="row mt-5">
                <div class="col-12">
                    <h2 class="section-title mb-4">Lokasi Kami</h2>
                    <div class="card border-0 shadow-sm card-hover">
                        <div class="card-body p-0">
                            <div class="ratio ratio-16x9">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4956.253403036841!2d120.32780298711576!3d-4.559578659580536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbde59aa739541d%3A0x6930b19d11d23227!2sSMKN%201%20Bone!5e0!3m2!1sid!2sid!4v1763355335581!5m2!1sid!2sid"
                                    width="600" height="450" style="border:0;" allowfullscreen=""
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

        // ===== CONTACT FORM SUBMISSION =====
        $('#contactForm').on('submit', function(e) {
            e.preventDefault();
            alert('Terima kasih! Pesan Anda telah berhasil dikirim. Tim kami akan segera menghubungi Anda.');
            $(this).trigger('reset');
        });
    </script>
</body>

</html>
