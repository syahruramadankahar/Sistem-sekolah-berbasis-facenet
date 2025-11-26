<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - SMK Negeri 1 Bone</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
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
            background: linear-gradient(rgba(0, 51, 102, 0.8), rgba(0, 34, 68, 0.8)),
                url('{{ asset('storage/image/fasilitas/Gemini_Generated_Image_jtjetsjtjetsjtje.png') }}') no-repeat center center;
            background-size: 110%;
            /* Sedikit zoom out */
            background-position: center 30%;
            /* Geser 30% dari atas */
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

        .news-section {
            padding: 5rem 0;
            background-color: var(--light-gray);
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

        /* ===== STAT NUMBER ===== */
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 0.5rem;
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

        /* ===== GURU IMAGE ===== */
        .guru-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
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

        /* ===== SWIPER SLIDER STYLING ===== */
        .swiper {
            width: 100%;
            height: 100%;
            padding: 20px 10px 40px;
        }

        .swiper-slide {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide .card {
            margin: 0 auto;
        }

        /* Custom Navigation Buttons */
        .swiper-button-next,
        .swiper-button-prev {
            background-color: var(--primary-blue);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 20px;
            font-weight: bold;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background-color: var(--hover-blue);
            transform: scale(1.1);
        }

        /* Pagination Styling */
        .swiper-pagination-bullet {
            width: 12px;
            height: 12px;
            background-color: var(--dark-gray);
            opacity: 0.5;
            transition: all 0.3s ease;
        }

        .swiper-pagination-bullet-active {
            background-color: var(--primary-blue);
            opacity: 1;
            transform: scale(1.2);
        }

        /* Jurusan Slider Specific */
        .jurusan-slider .swiper-slide {
            height: auto;
        }

        /* Fasilitas Slider Specific */
        .fasilitas-slider .swiper-slide {
            height: auto;
        }

        /* Guru Slider Specific */
        .guru-slider .swiper-slide {
            height: auto;
        }

        /* Ekstrakurikuler Slider Specific */
        .ekstrakurikuler-slider .swiper-slide {
            height: auto;
        }

        /* Gradient overlay for better text visibility */
        .card-img-overlay {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.7));
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            color: white;
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
                    <li class="nav-item"><a class="nav-link active" href="{{ url('/profil') }}"><i
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

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="display-4 fw-bold">Profil Sekolah</h1>
            <p class="lead">Mengenal lebih dekat SMK Negeri 1 Bone</p>
        </div>
    </section>

    <!-- Visi Misi -->
    <section class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 fade-in">
                    <h2 class="section-title mb-4">Visi & Misi</h2>
                    <div class="card border-0 shadow-sm card-hover">
                        <div class="card-body p-4">
                            <h4 class="card-title"><i class="fas fa-eye me-2"></i>Visi</h4>
                            <p class="mb-4">Visi yang dimiliki UPT SMKN 1 Bone adalah sebagai berikut: "Generasi Yang
                                Bertaqwa dan Berdaya Saing".</p>

                            <h4 class="card-title"><i class="fas fa-bullseye me-2"></i>Misi</h4>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Menumbuhkan semangat
                                    pengalaman imtaq kepada seluruh warga sekolah</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Menjadi teladan untuk
                                    mengamalkan akhlak mulia</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Mempersiapkan peserta
                                    didik yang berprestasi dibidang akademik dan nonakademik</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Membekali peserta didik
                                    dengan keterampilan sesuai dengan kompetensi keahliannya</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Menyiapkan peserta
                                    didik yang berdaya saing dalam bekerja</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5 fade-in">
                    <h2 class="section-title mb-4">Sejarah</h2>
                    <div class="card border-0 shadow-sm card-hover">
                        <div class="card-body p-4">
                            <p>SMKN 1 Bone tegak berdiri di Jalan Lapawawoi Kg. Sigeri kabupaten Bone. Sebelumnya
                                bernama SMEA Watampone, mula beroperasi sejak tahun 1965. Sekolah ini terletak pada
                                situasi geografis yang sangat strategis karena berada di lingkungan perkotaan sehingga
                                mudah diakses oleh masyarakat. Ada dua jalan utama yang melewati sekolah ini di mana
                                pada kedua jalan tersebut terdapat berbagai kantor dan sekolah (sekolah dasar, menengah
                                pertama dan menengah atas) membuatnya memiliki banyak manfaat. </p>
                            <p>Pada tahun 2021, sekolah ini ditetapkan oleh kementerian pendidikan, riset dan teknologi
                                melalui direktorat pendidikan vokasi sebagai salah satu SMK Pusat Keunggulan (SMK PK) di
                                Sulawesi Selatan. </p>
                            <div class="row text-center mt-4">
                                <div class="col-4">
                                    <div class="stat-number">1965</div>
                                    <small>Tahun Berdiri</small>
                                </div>
                                <div class="col-4">
                                    <div class="stat-number">A</div>
                                    <small>Akreditasi</small>
                                </div>
                                <div class="col-4">
                                    <div class="stat-number">1500+</div>
                                    <small>Alumni</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jurusan -->
    <section class="news-section">
        <div class="container">
            <h2 class="section-title">Program Jurusan</h2>
            <!-- Slider Jurusan -->
            <div class="swiper jurusan-slider">
                <div class="swiper-wrapper">
                    <!-- DPIB -->
                    <div class="swiper-slide">
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
                    <div class="swiper-slide">
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

                    <!-- Tata Busana -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon">
                                    <i class="fas fa-cut"></i>
                                </div>
                                <h5 class="card-title">Tata Busana</h5>
                                <p class="card-text small">
                                    Mempersiapkan peserta didik menjadi manusia yang produktif, mampu bekerja mandiri, dan
                                    dapat diserap oleh DUDI dengan keahlian di bidang busana serta wirausaha.
                                </p>
                                <span class="badge badge-custom">108 Siswa</span>
                            </div>
                        </div>
                    </div>

                    <!-- Kuliner -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon">
                                    <i class="fas fa-utensils"></i>
                                </div>
                                <h5 class="card-title">Kuliner</h5>
                                <p class="card-text small">
                                    Membekali peserta didik agar kompeten dalam mengolah, menyajikan, dan mengelola usaha
                                    kuliner, serta siap bekerja di industri makanan dan minuman.
                                </p>
                                <span class="badge badge-custom">21 Siswa</span>
                            </div>
                        </div>
                    </div>

                    <!-- Akuntansi -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon">
                                    <i class="fas fa-calculator"></i>
                                </div>
                                <h5 class="card-title">Akuntansi Keuangan Lembaga</h5>
                                <p class="card-text small">
                                    Membekali peserta didik dengan keterampilan akuntansi jasa, dagang, manufaktur, dan
                                    administrasi pajak, baik manual maupun komputerisasi.
                                </p>
                                <span class="badge badge-custom">164 Siswa</span>
                            </div>
                        </div>
                    </div>

                    <!-- MPLB -->
                    <div class="swiper-slide">
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

                    <!-- Pemasaran -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <h5 class="card-title">Pemasaran</h5>
                                <p class="card-text small">
                                    Menghasilkan tenaga kerja kompeten di bidang marketing, komunikasi bisnis, penataan
                                    produk, dan kewirausahaan agar siap bersaing secara global.
                                </p>
                                <span class="badge badge-custom">312 Siswa</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Fasilitas Sekolah -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title">Fasilitas Sekolah</h2>
            <!-- Slider Fasilitas -->
            <div class="swiper fasilitas-slider">
                <div class="swiper-wrapper">
                    <!-- Card Fasilitas -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <img src="{{ asset('image/fasilitas/WhatsApp Image 2025-11-12 at 13.45.55.jpeg') }}"
                                class="card-img-top" alt="Lapangan Upacara">
                            <div class="card-body text-center">
                                <h5 class="card-title">Lapangan Upacara</h5>
                                <p class="card-text small">Tempat pelaksanaan upacara dan kegiatan sekolah lainnya.</p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <img src=" {{ asset('image/fasilitas/WhatsApp Image 2025-11-12 at 13.45.56.jpeg') }}"
                                class="card-img-top" alt="Podium">
                            <div class="card-body text-center">
                                <h5 class="card-title">Podium</h5>
                                <p class="card-text small">Digunakan saat upacara dan kegiatan resmi sekolah.</p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <img src="{{ asset('image/fasilitas/WhatsApp Image 2025-11-12 at 13.45.58.jpeg') }}"
                                class="card-img-top" alt="Ruang Guru">
                            <div class="card-body text-center">
                                <h5 class="card-title">Ruang Guru</h5>
                                <p class="card-text small">Tempat kerja dan koordinasi tenaga pendidik.</p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <img src="{{ asset('image/fasilitas/ict.jpg') }}" class="card-img-top" alt="ICT Center">
                            <div class="card-body text-center">
                                <h5 class="card-title">ICT Center</h5>
                                <p class="card-text small">Pusat kegiatan teknologi informasi dan komunikasi sekolah.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Tambahan Fasilitas -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <img src="{{ asset('image/fasilitas/WhatsApp Image 2025-11-12 at 13.45.54.jpeg') }}"
                                class="card-img-top" alt="Aula">
                            <div class="card-body text-center">
                                <h5 class="card-title">Aula</h5>
                                <p class="card-text small">Tempat kegiatan rapat, seminar, dan acara sekolah.</p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <img src="{{ asset('image/fasilitas/perpustakaan.jpg') }}" class="card-img-top"
                                alt="Perpustakaan">
                            <div class="card-body text-center">
                                <h5 class="card-title">Perpustakaan</h5>
                                <p class="card-text small">Koleksi buku fisik dan digital untuk mendukung pembelajaran.</p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <img src="{{ asset('image/fasilitas/mushallah.jpeg') }}" class="card-img-top"
                                alt="Mushallah">
                            <div class="card-body text-center">
                                <h5 class="card-title">Mushallah</h5>
                                <p class="card-text small">Fasilitas ibadah yang bersih dan nyaman untuk warga sekolah.</p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <img src="{{ asset('image/fasilitas/uks.jpg') }}" class="card-img-top" alt="UKS">
                            <div class="card-body text-center">
                                <h5 class="card-title">Ruang UKS</h5>
                                <p class="card-text small">Tempat perawatan dan layanan kesehatan bagi siswa.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Guru & Staff -->
    <section class="news-section">
        <div class="container">
            <h2 class="section-title">Guru & Staff</h2>
            <!-- Slider Guru -->
            <div class="swiper guru-slider">
                <div class="swiper-wrapper">
                    <!-- Kepala Sekolah -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Kepala Sekolah" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">H. SYAMSUDDIN, S.Pd, M.Pd</h5>
                                <p class="card-text text-muted">Kepala Sekolah</p>
                                <p class="card-text small">19780908 200502 1 004</p>
                            </div>
                        </div>
                    </div>

                    <!-- Wakil Kepala Sekolah -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Wakil Kepala Sekolah" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">Dra. BUNGAWATI, M.M</h5>
                                <p class="card-text text-muted">Wakil Kepala Sekolah</p>
                                <p class="card-text small">19661120 199203 2 008</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 1 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">ISLAHUDDIN, S.Pd, M.Si</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19681019 199103 1 007</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 2 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">HERMANTO, S.Pd, M.Pd.</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19750425 200012 1 006</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 3 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">HERNIDAH, S.Pd</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19660511 199203 2 010</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 4 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">Drs. SYAMSU, M.M.</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19680402 199702 1 003</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 5 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">Drs. ARIFUDDIN</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19681231 199412 1 019</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 6 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">TUTY ASRINDAH, S.Pd</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19690803 199802 2 008</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 7 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">SUDIRMAN BIN NGALLA, S.Pd, M.Pd</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19711229 199603 1 001</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 8 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">MUHAMMAD ARFAH T., S.Pd., M.M</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19720515 199802 1 007</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 9 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">Hj. ROSMIDAH, S.Pd</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19741103 200502 2 003</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 10 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">JUMIATI, S.Pd.</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19741206 200604 2 017</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 11 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">Dr. HASWAH, S.Pd., M.Pd</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19770410 200502 2 006</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 12 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">Hj. FATMAWATI, S.Pd</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19790105 200604 2 012</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 13 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">NURJANNAH, S.Pd</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19790330 200604 2 005</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 14 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">KASMARYANI, S.Pd</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19820320 200604 2 021</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 15 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">A.R. TOETI HAFSIAH, S.Pd., M.Pd.</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19820324 200604 2 016</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 16 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">ROSMINARTY, S.Pd</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19830321 200604 2 013</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 17 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">FAJAR, S.Pd., M.Pd.</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19820411 200901 1 012</p>
                            </div>
                        </div>
                    </div>

                    <!-- Guru 18 -->
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm text-center card-hover">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                class="guru-img rounded-circle mx-auto mt-3" alt="Guru" width="120"
                                height="120">
                            <div class="card-body">
                                <h5 class="card-title">INDARSANI, S.Pd.</h5>
                                <p class="card-text text-muted">Guru</p>
                                <p class="card-text small">19740106 200904 2 001</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Ekstrakurikuler -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title">Ekstrakurikuler</h2>
            <!-- Slider Ekstrakurikuler -->
            <div class="swiper ekstrakurikuler-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon">
                                    <i class="fas fa-campground"></i>
                                </div>
                                <h5 class="card-title">Pramuka</h5>
                                <p class="card-text">Melatih kedisiplinan, tanggung jawab, dan kemandirian melalui kegiatan
                                    kepramukaan.</p>
                                <span class="badge badge-custom">Pembina: H. Syamsuddin, S.Pd, M.Pd</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <h5 class="card-title">PKS</h5>
                                <p class="card-text">Patroli Keamanan Sekolah yang berperan dalam menjaga ketertiban dan
                                    disiplin siswa.</p>
                                <span class="badge badge-custom">Pembina: Dra. Bungawati, M.M</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon">
                                    <i class="fas fa-drum"></i>
                                </div>
                                <h5 class="card-title">Marching Band</h5>
                                <p class="card-text">Melatih kekompakan dan musikalitas melalui seni musik barisan dan drum
                                    band.</p>
                                <span class="badge badge-custom">Pembina: Hj. Fatmawati, S.Pd</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon">
                                    <i class="fas fa-briefcase-medical"></i>
                                </div>
                                <h5 class="card-title">PMR</h5>
                                <p class="card-text">Palang Merah Remaja yang menanamkan semangat kemanusiaan dan
                                    kepedulian sosial.</p>
                                <span class="badge badge-custom">Pembina: Dr. Haswah, S.Pd., M.Pd</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon">
                                    <i class="fas fa-flag"></i>
                                </div>
                                <h5 class="card-title">Paskibra</h5>
                                <p class="card-text">Membentuk semangat kepemimpinan dan nasionalisme melalui pelatihan
                                    baris-berbaris.</p>
                                <span class="badge badge-custom">Pembina: KASMARYANI, S.Pd</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon">
                                    <i class="fas fa-microphone"></i>
                                </div>
                                <h5 class="card-title">PERSEPSI</h5>
                                <p class="card-text">Perkumpulan Seni dan Prestasi Siswa yang menyalurkan bakat dalam seni
                                    dan budaya.</p>
                                <span class="badge badge-custom">Pembina: Hj. Rosmidah, S.Pd</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <h5 class="card-title">PIK-R</h5>
                                <p class="card-text">Pusat Informasi dan Konseling Remaja yang berfokus pada kesehatan
                                    remaja dan perencanaan masa depan.</p>
                                <span class="badge badge-custom">Pembina: Indarsani, S.Pd</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 card-hover">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon">
                                    <i class="fas fa-mountain"></i>
                                </div>
                                <h5 class="card-title">SISPALA</h5>
                                <p class="card-text">Siswa Pecinta Alam yang mencintai lingkungan dan mengasah keterampilan
                                    bertahan di alam bebas.</p>
                                <span class="badge badge-custom">Pembina: Fajar, S.Pd., M.Pd.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
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
                        <li class="mb-2"><a href="{{ url('/kontak') }}">Kontak</a></li>
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
    <a href="{{ url('/profil') }}" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </a>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

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

        // ===== INISIALISASI SWIPER SLIDER =====
        
        // Slider Jurusan
        const jurusanSlider = new Swiper('.jurusan-slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });

        // Slider Fasilitas
        const fasilitasSlider = new Swiper('.fasilitas-slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                },
            },
        });

        // Slider Guru
        const guruSlider = new Swiper('.guru-slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                },
            },
        });

        // Slider Ekstrakurikuler
        const ekstrakurikulerSlider = new Swiper('.ekstrakurikuler-slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                },
            },
        });
    </script>
</body>

</html>