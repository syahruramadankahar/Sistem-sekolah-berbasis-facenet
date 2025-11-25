@extends('layouts.app')

@section('content')

<style>
    .absensi-container {
        max-width: 540px;
        margin: 0 auto;
        margin-top: 20px;
        animation: fadeIn 0.6s ease;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(12px);
        border-radius: 18px;
        padding: 25px;
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .video-frame {
        width: 100%;
        max-width: 360px;
        height: 280px;
        border-radius: 14px;
        border: 3px solid #6366f1;
        object-fit: cover;
        animation: glowVideo 2s infinite alternate;
    }

    @keyframes glowVideo {
        from { box-shadow: 0 0 10px rgba(99,102,241,.4); }
        to { box-shadow: 0 0 20px rgba(139,92,246,.8); }
    }

    .btn-glow {
        font-size: 1.15rem;
        border-radius: 12px;
        padding: 12px 26px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border: none;
        color: white;
        font-weight: 600;
        box-shadow: 0 6px 18px rgba(99, 102, 241, 0.4);
        transition: 0.3s;
    }

    .btn-glow:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 22px rgba(99, 102, 241, 0.6);
    }

    #statusMessage {
        font-size: 1.1rem;
        margin-top: 15px;
    }
</style>

<div class="container absensi-container">

    <h2 class="fw-bold text-center mb-3" style="color:#4f46e5;">
        📸 Absensi Wajah
    </h2>

    <p class="text-center text-muted mb-4">
        Silahkan arahkan wajah Anda untuk absensi.
    </p>

    <div class="glass-card text-center">

        <video id="video" autoplay playsinline class="video-frame mb-4"></video>

        <button id="btnCapture" class="btn-glow">
            <i class="fas fa-camera me-2"></i> Ambil Foto
        </button>

        <canvas id="canvas" style="display:none;"></canvas>

        <div id="statusMessage" class="fw-semibold"></div>
    </div>
</div>


{{-- ====================== CAMERA SCRIPT ====================== --}}
<script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const btnCapture = document.getElementById('btnCapture');
    const statusMessage = document.getElementById('statusMessage');

    // ==================== BUKA KAMERA ====================
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => video.srcObject = stream)
        .catch(() => {
            statusMessage.innerHTML = `<span class="text-danger">Kamera tidak ditemukan!</span>`;
        });

    // ==================== KETIKA AMBIL FOTO ====================
    btnCapture.addEventListener('click', () => {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        const ctx = canvas.getContext('2d');
        ctx.drawImage(video, 0, 0);
        const imageData = canvas.toDataURL("image/jpeg");

        statusMessage.innerHTML = "🔄 Menghubungi server Face Recognition...";

        // ==================== KIRIM KE FASTAPI ====================
        fetch("http://127.0.0.1:8001/absensi-wajah", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                gambar: imageData,
                tipe: "{{ $tipe }}",
                siswa_id: "{{ auth()->user()->siswa->id }}",
                
                // FOTO SISWA DARI STORAGE
                foto_url: "{{ asset('storage/siswa/' . auth()->user()->siswa->foto) }}"
            })
        })
        .then(res => res.json())
        .then(api => {

            console.log(api);

            if (!api.verified) {
                statusMessage.innerHTML =
                    `<span class='text-danger fw-bold'>
                        ❌ Wajah tidak cocok. Similarity: ${api.similarity}
                    </span>`;
                return;
            }

            statusMessage.innerHTML =
                `<span class='text-success fw-bold'>✔ Wajah terverifikasi (${api.similarity})</span>`;

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
                    foto_bukti: api.foto_bukti, // <----- SIMPAN FOTO BUKTI
                })
            })
            .then(res => res.json())
            .then(save => {
                if (save.status === "success") {
                    statusMessage.innerHTML =
                        "<span class='text-success fw-bold'>✔ Absensi berhasil dicatat!</span>";

                    setTimeout(() => {
                        window.location.href = "{{ route('siswa.absensi.index') }}";
                    }, 1200);
                }
            });

        })
        .catch(err => {
            console.error(err);
            statusMessage.innerHTML =
                `<span class='text-danger'>Gagal menghubungi server FastAPI</span>`;
        });
    });
</script>

@endsection
