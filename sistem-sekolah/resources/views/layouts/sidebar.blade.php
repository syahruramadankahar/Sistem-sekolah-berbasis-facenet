<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ Auth::user()->role === 'siswa' ? route('siswa.dashboard') : route('admin.dashboard') }}"
                class="logo d-flex align-items-center text-white text-decoration-none">
                <div class="d-flex align-items-center justify-content-center rounded-3 me-2">
                    <img src="{{ asset('storage/image/fasilitas/LOGO SMKN 1 BONE-Photoroom.png') }}" alt="Logo SMK"
                        height="35" class="me-2">
                </div>
                <span class="fw-bold">SISKOL</span>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">

                {{-- ====================== MENU SISWA ====================== --}}
                @if (Auth::check() && Auth::user()->role === 'siswa')
                    {{-- Dashboard --}}
                    <li class="nav-item {{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('siswa.dashboard') }}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    {{-- Profil --}}
                    <li class="nav-item {{ request()->routeIs('siswa.profil') ? 'active' : '' }}">
                        <a href="{{ route('siswa.profil') }}">
                            <i class="fas fa-user-circle"></i>
                            <p>Profil Saya</p>
                        </a>
                    </li>

                    {{-- ====================== ABSENSI ====================== --}}
                    <li class="nav-section">
                        <span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span>
                        <h4 class="text-section">Absensi</h4>
                    </li>

                    {{-- Riwayat Absensi --}}
                    <li class="nav-item {{ request()->routeIs('siswa.absensi.index') ? 'active' : '' }}">
                        <a href="{{ route('siswa.absensi.index') }}">
                            <i class="fas fa-history"></i>
                            <p>Riwayat Absensi</p>
                        </a>
                    </li>

                    {{-- Absensi Wajah --}}
                    <li class="nav-item {{ request()->routeIs('siswa.absensi.wajah') ? 'active' : '' }}">
                        <a href="{{ route('siswa.absensi.wajah') }}">
                            <i class="fas fa-camera"></i>
                            <p>Ajukan Absensi</p>
                        </a>
                    </li>

                    {{-- Logout --}}
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Akun</h4>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit"
                                class="btn w-100 text-start text-white d-flex align-items-center ps-3"
                                style="background: none; border: none;">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </button>
                        </form>
                    </li>

                    {{-- ====================== MENU ADMIN ====================== --}}
                @else
                    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Manajemen Data</h4>
                    </li>

                    <li class="nav-item {{ request()->is('admin/siswa*') ? 'active' : '' }}">
                        <a href="{{ route('admin.siswa.index') }}">
                            <i class="fas fa-user-graduate"></i>
                            <p>Data Siswa</p>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('admin/kelas*') ? 'active' : '' }}">
                        <a href="{{ route('admin.kelas.index') }}">
                            <i class="fas fa-school"></i>
                            <p>Data Kelas</p>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('admin/berita*') ? 'active' : '' }}">
                        <a href="{{ route('admin.berita.index') }}">
                            <i class="fas fa-newspaper"></i>
                            <p>Data Berita</p>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('admin/galeri*') ? 'active' : '' }}">
                        <a href="{{ route('admin.galeri.index') }}">
                            <i class="fas fa-images"></i>
                            <p>Data Galeri</p>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('admin/absensi*') ? 'active' : '' }}">
                        <a href="{{ route('admin.absensi.index') }}">
                            <i class="fas fa-clipboard-check"></i>
                            <p>Absensi Siswa</p>
                        </a>
                    </li>

                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Akun</h4>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit"
                                class="btn w-100 text-start text-white d-flex align-items-center ps-3"
                                style="background: none; border: none;">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</div>
