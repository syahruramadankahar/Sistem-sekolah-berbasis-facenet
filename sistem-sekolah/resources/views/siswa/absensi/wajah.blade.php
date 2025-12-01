@extends('layouts.app')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        .page-inner {
            padding: 20px;
        }

        .absensi-container {
            max-width: 600px;
            margin: 0 auto;
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header Section */
        .header-section {
            margin-bottom: 30px;
        }

        .header-title {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 4px;
        }

        .header-subtitle {
            font-size: 14px;
            color: #7f8c8d;
        }

        /* Main Card */
        .card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            border: 1px solid #e0e0e0;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
        }

        /* Video Section */
        .video-container {
            position: relative;
            margin-bottom: 24px;
        }

        .video-frame {
            width: 100%;
            height: 360px;
            border-radius: 12px;
            border: 3px solid #3498db;
            object-fit: cover;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 8px 24px rgba(52, 152, 219, 0.2);
        }

        .video-overlay {
            position: absolute;
            top: 16px;
            left: 16px;
            background: rgba(231, 76, 60, 0.9);
            backdrop-filter: blur(10px);
            padding: 8px 16px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-size: 12px;
            font-weight: 600;
        }

        .recording-dot {
            width: 8px;
            height: 8px;
            background: white;
            border-radius: 50%;
            animation: pulse-dot 1.5s ease-in-out infinite;
        }

        @keyframes pulse-dot {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(1.2);
            }
        }

        /* Button */
        .btn-capture-wrapper {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #3498db, #2980b9);
            border: none;
            border-radius: 8px;
            padding: 14px 32px;
            color: white;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 16px rgba(52, 152, 219, 0.3);
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .btn-primary-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s;
        }

        .btn-primary-custom:hover::before {
            left: 100%;
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #2980b9, #1f5f8b);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
        }

        .btn-primary-custom:active {
            transform: translateY(0);
        }

        /* Status Message */
        .status-message {
            padding: 14px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .status-message.info {
            background: #e3f2fd;
            color: #1565c0;
            border-left: 4px solid #3498db;
        }

        .status-message.success {
            background: #e8f5e9;
            color: #2e7d32;
            border-left: 4px solid #27ae60;
        }

        .status-message.error {
            background: #ffebee;
            color: #c62828;
            border-left: 4px solid #e74c3c;
        }

        .status-message.loading {
            background: #f3e5f5;
            color: #6a1b9a;
            border-left: 4px solid #9c27b0;
        }

        .status-message i {
            font-size: 16px;
        }

        /* Info Footer */
        .info-footer {
            padding: 14px 18px;
            background: #fff3cd;
            border-radius: 8px;
            border-left: 4px solid #f39c12;
            font-size: 13px;
            color: #856404;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-footer i {
            font-size: 16px;
            color: #f39c12;
        }

        /* Modal */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(8px);
            z-index: 9999;
            justify-content: center;
            align-items: center;
            padding: 20px;
            animation: fadeIn 0.3s ease;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            max-width: 480px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            overflow: hidden;
        }

        @keyframes slideUp {
            from {
                transform: translateY(60px) scale(0.9);
                opacity: 0;
            }

            to {
                transform: translateY(0) scale(1);
                opacity: 1;
            }
        }

        /* Modal Header */
        .modal-header {
            background: white;
            padding: 30px 28px 24px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
        }

        .modal-title {
            font-size: 24px;
            font-weight: 700;
            color: #2c3e50;
            margin: 0 0 8px 0;
        }

        .modal-subtitle {
            font-size: 14px;
            color: #7f8c8d;
            margin: 0;
            font-weight: 500;
        }

        /* Modal Body */
        .modal-body {
            padding: 28px;
        }

        .status-options {
            display: grid;
            gap: 14px;
            margin-bottom: 20px;
        }

        /* Status Buttons */
        .status-btn {
            padding: 18px 20px;
            border: 2px solid transparent;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            gap: 14px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .status-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s;
        }

        .status-btn:hover::before {
            left: 100%;
        }

        .status-btn-icon {
            width: 44px;
            height: 44px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
            transition: transform 0.3s ease;
        }

        .status-btn:hover .status-btn-icon {
            transform: scale(1.1);
        }

        .status-label {
            flex: 1;
            text-align: left;
        }

        .status-label-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .status-label-desc {
            font-size: 12px;
            opacity: 0.9;
            font-weight: 500;
        }

        .status-arrow {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .status-arrow i {
            font-size: 12px;
        }

        .status-btn:hover .status-arrow {
            background: rgba(255, 255, 255, 0.5);
            transform: translateX(4px);
        }

        .status-btn:hover {
            transform: translateX(6px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
        }

        .status-btn:active {
            transform: translateX(2px);
        }

        /* Button Variants */
        .btn-hadir {
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            color: white;
        }

        .btn-hadir .status-btn-icon {
            background: rgba(255, 255, 255, 0.2);
        }

        .btn-hadir:hover {
            background: linear-gradient(135deg, #229954, #27ae60);
            box-shadow: 0 4px 16px rgba(46, 204, 113, 0.3);
        }

        .btn-sakit {
            background: linear-gradient(135deg, #f39c12, #f1c40f);
            color: white;
        }

        .btn-sakit .status-btn-icon {
            background: rgba(255, 255, 255, 0.2);
        }

        .btn-sakit:hover {
            background: linear-gradient(135deg, #e67e22, #f39c12);
            box-shadow: 0 4px 16px rgba(243, 156, 18, 0.3);
        }

        .btn-izin {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
        }

        .btn-izin .status-btn-icon {
            background: rgba(255, 255, 255, 0.2);
        }

        .btn-izin:hover {
            background: linear-gradient(135deg, #2980b9, #1f5f8b);
            box-shadow: 0 4px 16px rgba(52, 152, 219, 0.3);
        }

        /* Modal Footer Info */
        .modal-footer-info {
            padding: 14px 18px;
            background: #f8f9fa;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 13px;
            color: #6c757d;
            border-left: 4px solid #3498db;
        }

        .modal-footer-info i {
            color: #3498db;
            font-size: 16px;
            flex-shrink: 0;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .card {
                padding: 24px 20px;
            }

            .video-frame {
                height: 280px;
            }

            .btn-primary-custom {
                padding: 12px 28px;
                font-size: 14px;
            }

            .modal-header {
                padding: 24px 20px 20px;
            }

            .modal-body {
                padding: 24px 20px;
            }

            .status-btn {
                padding: 16px 18px;
            }

            .status-btn-icon {
                width: 40px;
                height: 40px;
                font-size: 18px;
            }
        }

        /* Loading Spinner */
        .loading-spinner {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: currentColor;
            animation: spin 0.7s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>

    <div class="page-inner">
        <div class="absensi-container">
            <!-- Header -->
            <div class="header-section">
                <h3 class="header-title">
                    <i class="fas fa-user-shield me-2" style="color: #3498db;"></i>Absensi Wajah
                </h3>
                <p class="header-subtitle">Silahkan arahkan wajah Anda ke kamera untuk melakukan absensi</p>
            </div>

            <!-- Main Card -->
            <div class="card">
                <div class="video-container">
                    <video id="video" autoplay playsinline class="video-frame"></video>
                    <div class="video-overlay">
                        <div class="recording-dot"></div>
                        <span>LIVE</span>
                    </div>
                </div>

                <div class="btn-capture-wrapper">
                    <button id="btnCapture" class="btn-primary-custom">
                        <i class="fas fa-camera"></i>
                        <span>Ambil Foto</span>
                    </button>
                </div>

                <canvas id="canvas" style="display:none;"></canvas>

                <div id="statusMessage" class="status-message info">
                    <i class="fas fa-check-circle"></i>
                    <span>Kamera siap digunakan</span>
                </div>

                <div class="info-footer">
                    <i class="fas fa-lightbulb"></i>
                    <span>Pastikan wajah terlihat jelas dan pencahayaan cukup</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Status --}}
    <div id="modalStatus" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Wajah Terverifikasi!</h4>
                <p class="modal-subtitle">Pilih status kehadiran Anda</p>
            </div>

            <div class="modal-body">
                <div class="status-options">
                    <button class="status-btn btn-hadir" data-status="hadir">
                        <div class="status-btn-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="status-label">
                            <div class="status-label-title">Hadir</div>
                            <div class="status-label-desc">Saya mengikuti pembelajaran</div>
                        </div>
                        <div class="status-arrow">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </button>

                    <button class="status-btn btn-sakit" data-status="sakit">
                        <div class="status-btn-icon">
                            <i class="fas fa-thermometer-half"></i>
                        </div>
                        <div class="status-label">
                            <div class="status-label-title">Sakit</div>
                            <div class="status-label-desc">Saya sedang dalam kondisi sakit</div>
                        </div>
                        <div class="status-arrow">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </button>

                    <button class="status-btn btn-izin" data-status="izin">
                        <div class="status-btn-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="status-label">
                            <div class="status-label-title">Izin</div>
                            <div class="status-label-desc">Saya memiliki keperluan penting</div>
                        </div>
                        <div class="status-arrow">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </button>
                </div>

                <div class="modal-footer-info">
                    <i class="fas fa-info-circle"></i>
                    <span>Pilihan yang Anda tentukan akan tercatat dalam sistem</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const btnCapture = document.getElementById('btnCapture');
        const statusMessage = document.getElementById('statusMessage');
        const modalStatus = document.getElementById('modalStatus');

        let verifiedData = null;

        function updateStatus(type, icon, message) {
            statusMessage.className = `status-message ${type}`;
            statusMessage.innerHTML = `<i class="fas ${icon}"></i><span>${message}</span>`;
        }

        // Buka Kamera
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
                updateStatus('success', 'fa-check-circle', 'Kamera berhasil diakses');
            })
            .catch((error) => {
                console.error('Error accessing camera:', error);
                updateStatus('error', 'fa-exclamation-triangle',
                    'Kamera tidak dapat diakses. Pastikan Anda memberikan izin akses kamera.');
            });

        // Ambil Foto
        btnCapture.addEventListener('click', () => {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;

            const ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0);
            const imageData = canvas.toDataURL("image/jpeg");

            updateStatus('loading', 'fa-sync-alt fa-spin', 'Memproses wajah...');

            // Kirim ke FastAPI
            fetch("http://127.0.0.1:8001/absensi-wajah", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        gambar: imageData,
                        siswa_id: "{{ auth()->user()->siswa->id }}",
                        foto_url: "{{ asset('storage/siswa/' . auth()->user()->siswa->foto) }}"
                    })
                })
                .then(res => res.json())
                .then(api => {
                    console.log(api);

                    if (!api.verified) {
                        updateStatus('error', 'fa-times-circle', `Wajah tidak terdeteksi (${api.similarity})`);
                        return;
                    }

                    updateStatus('success', 'fa-check-circle', `Wajah terverifikasi (${api.similarity})`);
                    verifiedData = api;
                    modalStatus.classList.add('show');
                })
                .catch(err => {
                    console.error(err);
                    updateStatus('error', 'fa-exclamation-triangle', 'Gagal menghubungi server');
                });
        });

        // Handle Pilihan Status
        document.querySelectorAll('.status-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const selectedStatus = this.getAttribute('data-status');
                modalStatus.classList.remove('show');
                updateStatus('loading', 'fa-sync-alt fa-spin', 'Menyimpan absensi...');

                // Simpan Absensi
                fetch("{{ route('siswa.absensi.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            siswa_id: "{{ auth()->user()->siswa->id }}",
                            tipe: "{{ $tipe }}",
                            status: selectedStatus,
                            foto_bukti: verifiedData.foto_bukti,
                        })
                    })
                    .then(res => res.json())
                    .then(save => {
                        if (save.status === "success") {
                            updateStatus('success', 'fa-check-circle', 'Absensi berhasil dicatat!');
                            setTimeout(() => {
                                window.location.href = "{{ route('siswa.absensi.index') }}";
                            }, 1500);
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        updateStatus('error', 'fa-exclamation-triangle', 'Gagal menyimpan absensi');
                    });
            });
        });

        // Tutup Modal
        modalStatus.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('show');
            }
        });
    </script>
@endsection
