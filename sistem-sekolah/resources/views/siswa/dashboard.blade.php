@extends('layouts.app')

@section('content')
    <div class="page-inner">

        <!-- Header Dashboard -->
        <div class="dashboard-header mb-4" data-aos="fade-down">
            <h3 class="fw-bold mb-2 text-primary">Dashboard Siswa</h3>
            <p class="text-muted">Selamat datang di portal siswa SMK Negeri 1 Bone</p>
        </div>

        <div class="row mb-4">
            <!-- Info Siswa -->
            <div class="col-md-4 mb-3" data-aos="fade-right" data-aos-delay="100">
                <div class="card card-stats card-primary card-round card-hover">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <div class="icon-big text-center">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                            </div>
                            <div class="col-8 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Nama Siswa</p>
                                    <h4 class="card-title">{{ $siswa->nama }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kelas -->
            <div class="col-md-4 mb-3" data-aos="fade-right" data-aos-delay="200">
                <div class="card card-stats card-info card-round card-hover">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <div class="icon-big text-center">
                                    <i class="fas fa-school"></i>
                                </div>
                            </div>
                            <div class="col-8 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Kelas</p>
                                    <h4 class="card-title">{{ $siswa->kelas->nama_kelas ?? '-' }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jurusan -->
            <div class="col-md-4 mb-3" data-aos="fade-right" data-aos-delay="300">
                <div class="card card-stats card-success card-round card-hover">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <div class="icon-big text-center">
                                    <i class="fas fa-book-open"></i>
                                </div>
                            </div>
                            <div class="col-8 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Jurusan</p>
                                    <h4 class="card-title">{{ $siswa->jurusan }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Berita Terbaru -->
        <div class="row">
            <div class="col-md-12" data-aos="fade-up">
                <div class="card card-news">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-bullhorn me-2 text-warning"></i>
                            Pengumuman & Berita Terbaru
                        </h4>
                    </div>
                    <div class="card-body">
                        @foreach ($berita as $item)
                            <div class="news-item mb-4 pb-3 border-bottom">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h5 class="news-title fw-bold mb-2">{{ $item->judul }}</h5>
                                        <p class="news-content text-muted mb-2">{{ Str::limit($item->isi, 120) }}</p>
                                        <div class="news-meta">
                                            <small class="text-muted">
                                                <i class="fas fa-calendar me-1"></i>
                                                {{ $item->created_at->format('d M Y') }}
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <a href="{{ url('/berita/' . $item->id) }}" class="btn btn-primary-custom">
                                            <i class="fas fa-book-reader me-2"></i>Baca Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if ($berita->count() === 0)
                            <div class="text-center py-4">
                                <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Tidak ada berita tersedia saat ini.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Galeri Terbaru -->
        <div class="row">
            <div class="col-md-12" data-aos="fade-up">
                <div class="card card-news">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-bullhorn me-2 text-warning"></i>
                            Galeri Terbaru
                        </h4>
                    </div>
                    <div class="card-body">
                        @foreach ($galeri as $item)
                            <div class="news-item mb-4 pb-3 border-bottom">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h5 class="news-title fw-bold mb-2">{{ $item->judul }}</h5>
                                        <p class="news-content text-muted mb-2">{{ Str::limit($item->tanggal, 120) }}</p>
                                        <div class="news-meta">
                                            <small class="text-muted">
                                                <i class="fas fa-calendar me-1"></i>
                                                {{ $item->created_at->format('d M Y') }}
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <a href="{{ url('/galeri') }} " class="btn btn-primary-custom">
                                            <i class="fas fa-book-reader me-2"></i> Lihat Galeri
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if ($berita->count() === 0)
                            <div class="text-center py-4">
                                <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Tidak ada Galeri tersedia saat ini.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>
        /* Dashboard Header */
        .dashboard-header {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            padding: 1.5rem;
            border-radius: 12px;
            border-left: 4px solid #003366;
        }

        /* Card Hover Effects */
        .card-hover {
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            overflow: hidden;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        /* Icon Styling */
        .icon-big {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-primary .icon-big {
            background: linear-gradient(135deg, #003366, #004488);
            color: white;
        }

        .card-info .icon-big {
            background: linear-gradient(135deg, #17a2b8, #20c997);
            color: white;
        }

        .card-success .icon-big {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
        }

        /* Card Stats Styling */
        .card-category {
            font-size: 0.85rem;
            font-weight: 500;
            color: #6c757d;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #003366;
            margin-bottom: 0;
        }

        /* News Card Styling */
        .card-news {
            border: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            overflow: hidden;
        }

        .card-news .card-header {
            background: linear-gradient(135deg, #003366, #004488);
            color: white;
            border-bottom: none;
            padding: 1.25rem 1.5rem;
        }

        .card-news .card-title {
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
        }

        /* News Item Styling */
        .news-item {
            transition: all 0.3s ease;
            padding: 0.5rem;
            border-radius: 8px;
        }

        .news-item:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }

        .news-title {
            color: #003366;
            font-size: 1.1rem;
            line-height: 1.4;
        }

        .news-content {
            line-height: 1.5;
            font-size: 0.95rem;
        }

        .news-meta {
            font-size: 0.85rem;
        }

        /* Custom Button */
        .btn-primary-custom {
            background: linear-gradient(135deg, #003366 0%, #004488 100%);
            border: none;
            color: white;
            padding: 0.6rem 1.2rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            box-shadow: 0 4px 12px rgba(0, 51, 102, 0.2);
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0, 51, 102, 0.3);
            color: white;
            background: linear-gradient(135deg, #002244 0%, #003366 100%);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-header {
                padding: 1rem;
                text-align: center;
            }

            .icon-big {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }

            .card-title {
                font-size: 1.1rem;
            }

            .news-item .row {
                flex-direction: column;
                text-align: center;
            }

            .news-item .col-md-4 {
                margin-top: 1rem;
            }

            .btn-primary-custom {
                width: 100%;
            }
        }

        /* Animation for cards */
        [data-aos] {
            opacity: 0;
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        [data-aos].aos-animate {
            opacity: 1;
        }
    </style>

    <script>
        // Simple AOS implementation for animations
        document.addEventListener('DOMContentLoaded', function() {
            const aosElements = document.querySelectorAll('[data-aos]');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('aos-animate');
                        const delay = entry.target.getAttribute('data-aos-delay');
                        if (delay) {
                            entry.target.style.transitionDelay = delay + 'ms';
                        }
                    }
                });
            }, {
                threshold: 0.1
            });

            aosElements.forEach(el => observer.observe(el));
        });
    </script>
@endsection
