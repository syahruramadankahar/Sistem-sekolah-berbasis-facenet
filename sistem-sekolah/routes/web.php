<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// ===============================
// FRONTEND CONTROLLER
// ===============================
use App\Http\Controllers\FrontendController;

// ===============================
// AUTENTIKASI
// ===============================
use App\Http\Controllers\AuthController;

// ===============================
// ADMIN CONTROLLERS
// ===============================
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\GaleriController;

// ===============================
// SISWA AREA CONTROLLERS
// ===============================
use App\Http\Controllers\Siswa\ProfileController;
use App\Http\Controllers\Siswa\AbsensiController;

// ===============================
// EXPORT
// ===============================
use App\Http\Controllers\SiswaExportController;



// =================================================================
// 🔵 1. FRONTEND (PUBLIC WEBSITE)
// =================================================================
Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/profil', 'profil')->name('profil');

    Route::get('/berita/{id?}', 'berita')->name('berita');
    Route::get('/galeri', 'galeri')->name('galeri');
    Route::get('/kontak', 'kontak')->name('kontak');
});



// =================================================================
// 🔵 2. AUTENTIKASI
// =================================================================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');



// =================================================================
// 🔵 3. REDIRECT DASHBOARD SESUAI ROLE
// =================================================================
Route::get('/dashboard', function () {

    if (!Auth::check()) {
        return redirect()->route('login');
    }

    return match (Auth::user()->role) {
        'admin' => redirect()->route('admin.dashboard'),
        'siswa' => redirect()->route('siswa.dashboard'),
        default => abort(403, 'Akses tidak diizinkan.')
    };

})->name('dashboard');



// =================================================================
// 🔵 4. ADMIN AREA
// =================================================================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        Route::resource('/siswa', SiswaController::class);
        Route::resource('/kelas', KelasController::class);
        Route::resource('/berita', BeritaController::class);
        Route::resource('/galeri', GaleriController::class);

        // Export Excel & PDF
        Route::get('/siswa/export/excel', [SiswaExportController::class, 'exportExcel'])
            ->name('siswa.excel');

        Route::get('/siswa/export/pdf', [SiswaExportController::class, 'exportPdf'])
            ->name('siswa.pdf');

        Route::get('/absensi', [\App\Http\Controllers\Admin\AbsensiController::class, 'index'])
            ->name('absensi.index');

        Route::get('/absensi/show/{id}', [\App\Http\Controllers\Admin\AbsensiController::class, 'show'])
            ->name('absensi.show');

        Route::get('/absensi/create', [App\Http\Controllers\Admin\AbsensiController::class, 'create'])
            ->name('absensi.create');

        Route::get('/absensi/{id}/edit', [App\Http\Controllers\Admin\AbsensiController::class, 'edit'])
            ->name('absensi.edit');
        
        Route::post('/absensi', [App\Http\Controllers\Admin\AbsensiController::class, 'store'])
            ->name('absensi.store');
            
        Route::put('/absensi/{id}', [App\Http\Controllers\Admin\AbsensiController::class, 'update'])
            ->name('absensi.update');

        Route::delete('/absensi/{id}', [App\Http\Controllers\Admin\AbsensiController::class, 'destroy'])
            ->name('absensi.destroy');
    });



// =================================================================
// 🔵 5. SISWA AREA (PROFILE + ABSENSI)
// =================================================================

Route::middleware(['auth', 'role:siswa'])
    ->prefix('siswa')
    ->name('siswa.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [ProfileController::class, 'dashboard'])
            ->name('dashboard');

        // Profil
        Route::get('/profil', [ProfileController::class, 'profil'])
            ->name('profil');

        // Absensi — daftar riwayat
        Route::get('/absensi', [\App\Http\Controllers\Siswa\AbsensiController::class, 'index'])
            ->name('absensi.index');

        // Absensi wajah – halaman kamera
        Route::get('/absensi/wajah/{tipe?}', [AbsensiController::class, 'wajah'])
            ->name('absensi.wajah')
            ->middleware(['auth', 'role:siswa']);
    });

// =================================================================
// 🔵 6. FALLBACK 404
// =================================================================
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

Route::post('/siswa/absensi/store', 
    [\App\Http\Controllers\Siswa\AbsensiController::class, 'store']
)->name('siswa.absensi.store');