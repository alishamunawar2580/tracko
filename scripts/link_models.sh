#!/usr/bin/env bash
# link_models.sh
#
# Creates symlinks (or copies) from a mounted model storage path into the
# correct ComfyUI models/ subfolders, so ComfyUI can find every model without
# duplicating large files.
#
# Environment variables:
#   COMFYUI_DIR       ComfyUI installation directory.   Default: /workspace/ComfyUI
#   MODEL_STORE       Path where the existing network storage is mounted.
#                     Default: /models-store
#   LINK_MODE         "symlink" (default) or "copy".
#                     Use "copy" if the model storage is on a different filesystem
#                     that does not support cross-device symlinks.
#
# Usage:
#   bash scripts/link_models.sh
#   MODEL_STORE=/mnt/client-volume COMFYUI_DIR=/opt/ComfyUI bash scripts/link_models.sh
#
# Idempotent: existing symlinks/files are not overwritten; new ones are created.
#
# After running this script, the expected ComfyUI model folder structure is:
#
#   ComfyUI/models/
#   ├── checkpoints/
#   │   └── CHEYENNE_v16.safetensors          [PLACEHOLDER — provide link]
#   ├── vae/
#   │   ├── sdxl_vae.safetensors              [PLACEHOLDER — confirm source]
#   │   └── qwen_image_vae.safetensors
#   ├── loras/
#   │   ├── Qwen-Image-2512-Lightning-8steps-V1.0-bf16.safetensors
#   │   ├── Qwen-Image-Edit-2511-Lightning-4steps-V1.0-bf16.safetensors
#   │   └── trainings/qwen2512_161imgs_detailed/750.safetensors  [PRIVATE]
#   ├── controlnet/
#   │   ├── diffusion_pytorch_model.safetensors   [InstantID CN — confirm repo]
#   │   └── controlnetTile.safetensors
#   ├── upscale_models/
#   │   └── 4x-UltraSharp.pth
#   ├── clip/
#   │   └── qwen_2.5_vl_7b_fp8_scaled.safetensors
#   └── diffusion_models/
#       ├── qwen_image_2512_bf16.safetensors       [confirm filename with client]
#       └── qwen_image_edit_2511_bf16.safetensors

set -euo pipefail

COMFYUI_DIR="${COMFYUI_DIR:-/workspace/ComfyUI}"
MODEL_STORE="${MODEL_STORE:-/models-store}"
LINK_MODE="${LINK_MODE:-symlink}"
MODELS_DIR="${COMFYUI_DIR}/models"

# ── Validate paths ────────────────────────────────────────────────────────────
if [ ! -d "${COMFYUI_DIR}" ]; then
    echo "ERROR: ComfyUI directory not found: ${COMFYUI_DIR}" >&2
    echo "       Run scripts/install_comfyui.sh first." >&2
    exit 1
fi

if [ ! -d "${MODEL_STORE}" ]; then
    echo "ERROR: Model storage not mounted at: ${MODEL_STORE}" >&2
    echo "       Mount the network volume or set MODEL_STORE to the correct path." >&2
    exit 1
fi

echo "==> [link_models] ComfyUI dir : ${COMFYUI_DIR}"
echo "==> [link_models] Model store : ${MODEL_STORE}"
echo "==> [link_models] Link mode   : ${LINK_MODE}"
echo ""

# ── Helper: link or copy a single file ───────────────────────────────────────
link_model() {
    local src="$1"         # path inside MODEL_STORE
    local dest_dir="$2"    # target subdirectory inside MODELS_DIR
    local dest_name="${3:-$(basename "${src}")}"  # optional rename

    local full_src="${MODEL_STORE}/${src}"
    local full_dest="${dest_dir}/${dest_name}"

    mkdir -p "${dest_dir}"

    if [ ! -e "${full_src}" ]; then
        echo "  [MISSING] ${full_src}"
        echo "            Add this file to ${MODEL_STORE} and re-run this script."
        return 0
    fi

    if [ -e "${full_dest}" ] || [ -L "${full_dest}" ]; then
        echo "  [EXISTS ] ${full_dest} — skipping."
        return 0
    fi

    if [ "${LINK_MODE}" = "copy" ]; then
        echo "  [COPY   ] ${full_src} -> ${full_dest}"
        cp "${full_src}" "${full_dest}"
    else
        echo "  [SYMLINK] ${full_src} -> ${full_dest}"
        ln -s "${full_src}" "${full_dest}"
    fi
}

# ── Checkpoints ───────────────────────────────────────────────────────────────
echo "--- checkpoints ---"
link_model "checkpoints/CHEYENNE_v16.safetensors" \
    "${MODELS_DIR}/checkpoints"

# ── VAE ───────────────────────────────────────────────────────────────────────
echo "--- vae ---"
link_model "vae/sdxl_vae.safetensors" \
    "${MODELS_DIR}/vae"

link_model "vae/qwen_image_vae.safetensors" \
    "${MODELS_DIR}/vae"

# ── LoRAs ─────────────────────────────────────────────────────────────────────
echo "--- loras ---"
link_model "loras/Qwen-Image-2512-Lightning-8steps-V1.0-bf16.safetensors" \
    "${MODELS_DIR}/loras"

link_model "loras/Qwen-Image-Edit-2511-Lightning-4steps-V1.0-bf16.safetensors" \
    "${MODELS_DIR}/loras"

# Private LoRA — must be placed by the client in the model store
link_model "loras/trainings/qwen2512_161imgs_detailed/750.safetensors" \
    "${MODELS_DIR}/loras/trainings/qwen2512_161imgs_detailed"

# ── ControlNet ────────────────────────────────────────────────────────────────
echo "--- controlnet ---"
link_model "controlnet/diffusion_pytorch_model.safetensors" \
    "${MODELS_DIR}/controlnet"

link_model "controlnet/controlnetTile.safetensors" \
    "${MODELS_DIR}/controlnet"

# ── Upscale models ────────────────────────────────────────────────────────────
echo "--- upscale_models ---"
link_model "upscale_models/4x-UltraSharp.pth" \
    "${MODELS_DIR}/upscale_models"

# ── CLIP / text encoders ──────────────────────────────────────────────────────
echo "--- clip ---"
link_model "clip/qwen_2.5_vl_7b_fp8_scaled.safetensors" \
    "${MODELS_DIR}/clip"

# ── Diffusion models (UNet) ───────────────────────────────────────────────────
echo "--- diffusion_models ---"
# The workflow may reference qwen_image_2512_bf16.safetensors or
# qwen_image_2512_fp8_e4m3fn.safetensors depending on the client's setup.
# Link whichever variant exists in MODEL_STORE; uncomment the fp8 line if needed.
link_model "diffusion_models/qwen_image_2512_bf16.safetensors" \
    "${MODELS_DIR}/diffusion_models"

# Uncomment the line below if the client provides the fp8 variant instead:
# link_model "diffusion_models/qwen_image_2512_fp8_e4m3fn.safetensors" \
#     "${MODELS_DIR}/diffusion_models"

link_model "diffusion_models/qwen_image_edit_2511_bf16.safetensors" \
    "${MODELS_DIR}/diffusion_models"

echo ""
echo "==> [link_models] Done."
echo ""
echo "Expected ComfyUI model folder structure:"
echo ""
if [ -d "${MODELS_DIR}" ]; then
    find "${MODELS_DIR}" -maxdepth 3 | sort | sed "s|${COMFYUI_DIR}/||"
else
    echo "  (No model directories were created — all source files were missing.)"
    echo "  Add models to ${MODEL_STORE} and re-run this script."
fi
