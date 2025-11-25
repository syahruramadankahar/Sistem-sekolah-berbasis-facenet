<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
  <div class="container-fluid">

    <!-- Tombol Sidebar (mobile) -->
    <button id="sidebarToggleTop" class="btn btn-sm btn-outline-light d-md-none rounded-circle me-3">
      <i class="bi bi-list fs-5"></i>
    </button>

    <!-- Judul Sistem -->
    <h5 class="fw-semibold text-black m-2 align-items-center">
      <img src="{{ asset('storage/image/fasilitas/LOGO SMKN 1 BONE-Photoroom.png') }}" alt="Logo SMK" height="35" class="me-2">
      Siskol - SMKN 1 Bone
    </h5>

    <!-- Profil User -->
    <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
      <li class="nav-item dropdown">

        @php
            $user = Auth::user();
        @endphp

        <a class="nav-link dropdown-toggle d-flex align-items-center text-black" href="#" id="userDropdown" data-bs-toggle="dropdown">
          <div class="position-relative me-2">

            <!-- FOTO USER -->
        @php
            $user = Auth::user();

            // jika role siswa → ambil foto dari tabel siswa
            if ($user->role === 'siswa' && $user->siswa && $user->siswa->foto) {
                $fotoProfil = asset('storage/siswa/' . $user->siswa->foto);
            }
            // jika admin punya kolom foto (opsional), ambil dari $user->photo
            elseif ($user->photo ?? false) {
                $fotoProfil = asset('storage/' . $user->photo);
            }
            // fallback default
            else {
                $fotoProfil = asset('template1/assets/img/profile.jpg');
            }
        @endphp

        <img src="{{ $fotoProfil }}"
            alt="Profil"
            class="rounded-circle border border-light shadow-sm"
            width="38" height="38"
            style="object-fit: cover;">

            <!-- Status online hijau -->
            <span class="position-absolute bottom-0 end-0 bg-success border border-2 border-white rounded-circle"
                  style="width: 12px; height: 12px;"></span>
          </div>

          <!-- Nama + Role -->
          <div>
            <span class="fw-semibold d-block">{{ $user->name }}</span>
            <small class="text-secondary opacity-75" style="font-size: 0.7rem;">
              {{ ucfirst($user->role) }}
            </small>
          </div>
        </a>

        <!-- DROPDOWN PROFIL -->
        <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 animated fadeIn"
            aria-labelledby="userDropdown">

          <li class="dropdown-header text-center pb-2">

            <div class="position-relative d-inline-block mb-2">
              <img src="{{ $fotoProfil }}"
                   alt="Profil" class="rounded-circle border border-3 border-primary shadow"
                   width="70" height="70"
                   style="object-fit: cover;">
              <span class="position-absolute bottom-0 end-0 bg-success border border-2 border-white rounded-circle"
                    style="width: 16px; height: 16px;"></span>
            </div>

            <strong class="d-block">{{ $user->name }}</strong>
            <small class="text-muted d-block">{{ $user->email }}</small>

            <span class="badge bg-primary mt-1">
              {{ ucfirst($user->role) }}
            </span>

            <!-- Tombol logout -->
            <form action="{{ route('logout') }}" method="POST" class="mt-2">
              @csrf
              <button class="dropdown-item text-danger fw-semibold">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
              </button>
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
