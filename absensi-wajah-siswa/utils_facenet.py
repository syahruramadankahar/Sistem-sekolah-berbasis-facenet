import torch
import numpy as np
import cv2
from facenet_pytorch import MTCNN, InceptionResnetV1
from PIL import Image
import io
import base64

device = 'cuda' if torch.cuda.is_available() else 'cpu'

# MODEL MUKA
mtcnn = MTCNN(image_size=160, margin=20, device=device)
resnet = InceptionResnetV1(pretrained='vggface2').eval().to(device)

def embed_from_base64(base64_str):
    img_data = base64.b64decode(base64_str.split(",")[-1])
    img = Image.open(io.BytesIO(img_data)).convert("RGB")

    face = mtcnn(img)
    if face is None:
        return None
    
    embedding = resnet(face.unsqueeze(0).to(device)).detach().cpu().numpy()
    return embedding[0].tolist()

def embed_from_path(path):
    img = Image.open(path).convert("RGB")

    face = mtcnn(img)
    if face is None:
        return None

    embedding = resnet(face.unsqueeze(0).to(device)).detach().cpu().numpy()
    return embedding[0].tolist()
