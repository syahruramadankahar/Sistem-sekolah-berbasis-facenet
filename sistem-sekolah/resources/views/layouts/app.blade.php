<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>SiSkol - Sistem Sekolah SMKN 1 Bone</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <!-- Fonts and Icons -->
    <script src="{{ asset('template1/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{ asset('template1/assets/css/fonts.min.css') }}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('template1/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('template1/assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('template1/assets/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('template1/assets/css/demo.css') }}" />
  </head>

  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        @include('layouts.sidebar')
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <!-- Header -->
        <div class="main-header">
          <div class="main-header-logo">
            <div class="logo-header" data-background-color="dark">
              <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center gap-2 text-white text-decoration-none">
                <i class="bi bi-mortarboard-fill fs-4"></i>
                <span class="fw-bold">SiSkol</span>
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar"><i class="gg-menu-right"></i></button>
                <button class="btn btn-toggle sidenav-toggler"><i class="gg-menu-left"></i></button>
              </div>
              <button class="topbar-toggler more"><i class="gg-more-vertical-alt"></i></button>
            </div>
          </div>

          <!-- Navbar -->
          @include('layouts.navbar')
        </div>
        <!-- End Header -->

        <!-- Main Content -->
        <main class="container py-4">
          @yield('content')
        </main>
        <!-- End Main Content -->

        <!-- Footer -->
        <footer class="footer text-center py-3 mt-auto">
          <div class="container">
            <small class="text-muted">
              © {{ date('Y') }} <strong>SiSkol</strong> — Sistem Informasi Sekolah
            </small>
          </div>
        </footer>
        <!-- End Footer -->
      </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('template1/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('template1/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('template1/assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('template1/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('template1/assets/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('template1/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('template1/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('template1/assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('template1/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('template1/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('template1/assets/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('template1/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('template1/assets/js/kaiadmin.min.js') }}"></script>
  </body>
</html>
