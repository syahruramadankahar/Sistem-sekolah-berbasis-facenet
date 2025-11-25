import os
import base64
import requests
import numpy as np
from datetime import datetime

from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel

from facenet_pytorch import MTCNN, InceptionResnetV1
from PIL import Image
import torch
from io import BytesIO

app = FastAPI(title="API Absensi Wajah", version="2.1")

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_methods=["*"],
    allow_headers=["*"],
)

# ======================================
# LOAD MODEL
# ======================================
device = torch.device("cuda" if torch.cuda.is_available() else "cpu")

mtcnn = MTCNN(image_size=160, margin=20, device=device)
resnet = InceptionResnetV1(pretrained="vggface2").eval().to(device)


# ======================================
# FOLDER PENYIMPANAN LARAVEL
# ======================================
LARAVEL_STORAGE = "../sistem-sekolah/storage/app/public/foto_absensi"
os.makedirs(LARAVEL_STORAGE, exist_ok=True)

PUBLIC_URL = "http://127.0.0.1:8000/storage/foto_absensi/"


# ======================================
# REQUEST BODY
# ======================================
class AbsensiRequest(BaseModel):
    gambar: str
    tipe: str
    siswa_id: int
    foto_url: str


# ======================================
# UTIL FUNCTIONS
# ======================================
def decode_base64_to_image(base64_str):
    base64_str = base64_str.split(",")[-1]
    img_bytes = base64.b64decode(base64_str)
    return Image.open(BytesIO(img_bytes)).convert("RGB")


def download_image(url):
    resp = requests.get(url)
    if resp.status_code != 200:
        return None
    return Image.open(BytesIO(resp.content)).convert("RGB")


def get_embedding(pil_img):
    face = mtcnn(pil_img)
    if face is None:
        return None

    if len(face.shape) == 3:
        face = face.unsqueeze(0)

    face = face.to(device)

    with torch.no_grad():
        emb = resnet(face)

    return emb[0].cpu().numpy()


def cosine_similarity(a, b):
    a = a / np.linalg.norm(a)
    b = b / np.linalg.norm(b)
    return float(np.dot(a, b))


# ======================================
# MAIN API
# ======================================
@app.post("/absensi-wajah")
async def absensi_wajah(data: AbsensiRequest):

    print("\n========== REQUEST MASUK ==========")
    print("Siswa ID :", data.siswa_id)
    print("Tipe     :", data.tipe)
    print("Foto DB  :", data.foto_url)
    print("===================================\n")

    # 1. Decode gambar kamera
    try:
        img_kamera = decode_base64_to_image(data.gambar)
    except:
        return {"status": "error", "message": "Gagal membaca gambar kamera"}

    # 2. Download foto siswa dari Laravel
    img_siswa = download_image(data.foto_url)
    if img_siswa is None:
        return {"status": "error", "message": "Tidak bisa mengambil foto siswa dari server Laravel"}

    # 3. Embedding kamera
    emb_kamera = get_embedding(img_kamera)
    if emb_kamera is None:
        return {"status": "error", "message": "Wajah tidak terdeteksi di kamera"}

    # 4. Embedding foto siswa
    emb_siswa = get_embedding(img_siswa)
    if emb_siswa is None:
        return {"status": "error", "message": "Wajah tidak terdeteksi pada foto siswa"}

    # 5. Similarity check
    sim = cosine_similarity(emb_kamera, emb_siswa)
    THRESHOLD = 0.68
    verified = sim >= THRESHOLD

    print(f"[INFO] Similarity = {sim:.4f}")

    # 6. Simpan foto bukti langsung ke storage Laravel
    filename = f"{data.siswa_id}_{data.tipe}_{int(datetime.now().timestamp())}.jpg"
    save_path = os.path.join(LARAVEL_STORAGE, filename)
    img_kamera.save(save_path)

    # URL publik untuk disimpan ke database Laravel
    public_url = PUBLIC_URL + filename

    if verified:
        return {
            "status": "success",
            "verified": True,
            "similarity": sim,
            "foto_bukti": filename,       # hanya kirim filename
            "foto_bukti_url": public_url, # URL publik
            "message": "Wajah cocok! Absensi boleh dicatat."
        }

    return {
        "status": "failed",
        "verified": False,
        "similarity": sim,
        "foto_bukti": filename,
        "foto_bukti_url": public_url,
        "message": "Wajah tidak cocok."
    }


@app.get("/")
def home():
    return {"status": "running", "message": "FastAPI aktif"}
