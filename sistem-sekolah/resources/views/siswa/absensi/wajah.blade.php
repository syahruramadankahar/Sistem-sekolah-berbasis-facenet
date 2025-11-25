@extends('layouts.app')

@section('content')
    <style>
        .absensi-container {
            max-width: 500px;
            margin: 0 auto;
            margin-top: 30px;
            animation: fadeIn 0.6s ease;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            border: 1px solid #e0e0e0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .video-frame {
            width: 100%;
            height: 280px;
            border-radius: 8px;
            border: 2px solid #3498db;
            object-fit: cover;
            background: #f8f9fa;
        }

        .btn-primary-custom {
            background: #3498db;
            border: none;
            border-radius: 6px;
            padding: 12px 30px;
            color: white;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            background: #2980b9;
            transform: translateY(-1px);
        }

        .status-message {
            font-size: 14px;
            margin-top: 15px;
            padding: 10px;
            border-radius: 6px;
            background: #f8f9fa;
        }

        .text-success {
            color: #27ae60;
        }

        .text-danger {
            color: #e74c3c;
        }

        .text-info {
            color: #3498db;
        }
    </style>

    <div class="container absensi-container">
        <div class="text-center mb-4">
            <h3 class="fw-bold" style="color: #2c3e50; font-family: 'Inter', 'Segoe UI', sans-serif;">
                📸 Absensi Wajah
            </h3>
            <p class="text-muted" style="font-size: 14px;">
                Silahkan arahkan wajah Anda ke kamera untuk melakukan absensi
            </p>
        </div>

        <div class="card text-center">
            <div class="mb-4">
                <video id="video" autoplay playsinline class="video-frame"></video>
            </div>

            <button id="btnCapture" class="btn-primary-custom mb-3">
                <i class="fas fa-camera me-2"></i> Ambil Foto
            </button>

            <canvas id="canvas" style="display:none;"></canvas>

            <div id="statusMessage" class="status-message">
                <span class="text-info">
                    <i class="fas fa-info-circle me-1"></i>
                    Kamera siap digunakan
                </span>
            </div>
        </div>

        <div class="mt-4 text-center">
            <p class="text-muted" style="font-size: 12px;">
                <i class="fas fa-lightbulb me-1"></i>
                Pastikan wajah terlihat jelas dan pencahayaan cukup
            </p>
        </div>
    </div>

    {{-- ====================== CAMERA SCRIPT ====================== --}}
    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const btnCapture = document.getElementById('btnCapture');
        const statusMessage = document.getElementById('statusMessage');

        // ==================== BUKA KAMERA ====================
        navigator.mediaDevices.getUserMedia({
                video: {
                    width: {
                        ideal: 1280
                    },
                    height: {
                        ideal: 720
                    },
                    facingMode: 'user'
                }
            })
            .then(stream => {
                video.srcObject = stream;
                statusMessage.innerHTML = `
                    <span class="text-success">
                        <i class="fas fa-check-circle me-1"></i>
                        Kamera berhasil diakses
                    </span>`;
            })
            .catch((error) => {
                console.error('Error accessing camera:', error);
                statusMessage.innerHTML = `
                    <span class="text-danger">
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        Kamera tidak dapat diakses. Pastikan Anda memberikan izin akses kamera.
                    </span>`;
            });

        // ==================== KETIKA AMBIL FOTO ====================
        btnCapture.addEventListener('click', () => {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;

            const ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0);
            const imageData = canvas.toDataURL("image/jpeg");

            statusMessage.innerHTML = `
                <span class="text-info">
                    <i class="fas fa-sync-alt fa-spin me-1"></i>
                    Memproses wajah...
                </span>`;

            // ==================== KIRIM KE FASTAPI ====================
            fetch("http://127.0.0.1:8001/absensi-wajah", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        gambar: imageData,
                        tipe: "{{ $tipe }}",
                        siswa_id: "{{ auth()->user()->siswa->id }}",
                        foto_url: "{{ asset('storage/siswa/' . auth()->user()->siswa->foto) }}"
                    })
                })
                .then(res => res.json())
                .then(api => {
                    console.log(api);

                    if (!api.verified) {
                        statusMessage.innerHTML = `
                            <span class='text-danger'>
                                <i class="fas fa-times-circle me-1"></i>
                                Wajah tidak terdeteksi (${api.similarity})
                            </span>`;
                        return;
                    }

                    statusMessage.innerHTML = `
                        <span class='text-success'>
                            <i class="fas fa-check-circle me-1"></i>
                            Wajah terverifikasi (${api.similarity})
                        </span>`;

                    // ==================== SIMPAN ABSENSI DI LARAVEL ====================
                    fetch("{{ route('siswa.absensi.store') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                siswa_id: "{{ auth()->user()->siswa->id }}",
                                tipe: "{{ $tipe }}",
                                foto_bukti: api.foto_bukti,
                            })
                        })
                        .then(res => res.json())
                        .then(save => {
                            if (save.status === "success") {
                                statusMessage.innerHTML = `
                                    <span class='text-success'>
                                        <i class="fas fa-check-circle me-1"></i>
                                        Absensi berhasil dicatat!
                                    </span>`;

                                setTimeout(() => {
                                    window.location.href = "{{ route('siswa.absensi.index') }}";
                                }, 1500);
                            }
                        });

                })
                .catch(err => {
                    console.error(err);
                    statusMessage.innerHTML = `
                        <span class='text-danger'>
                            <i class="fas fa-exclamation-triangle me-1"></i>
                            Gagal menghubungi server
                        </span>`;
                });
        });
    </script>
@endsection
