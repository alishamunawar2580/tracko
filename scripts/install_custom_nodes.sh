#!/usr/bin/env bash
# install_custom_nodes.sh
#
# Installs all custom node repositories required by the ComfyUI workflow into
# ComfyUI's custom_nodes/ directory, then installs each node's Python
# dependencies.
#
# Custom nodes installed:
#   - ComfyUI_InstantID          (face identity guidance)
#   - comfyui-rmbg               (background removal / SAM3Segment)
#   - comfyui-inpaint-cropandstitch
#   - ComfyUI_UltimateSDUpscale  (tiled upscaling)
#   - comfyui_controlnet_aux     (ControlNet preprocessors including tile)
#   - ComfyUI-KJNodes            (utility nodes)
#   - ComfyUI_essentials         (essential utility nodes)
#   - rgthree-comfy              (workflow management nodes)
#
# Environment variables (all optional):
#   COMFYUI_DIR   ComfyUI installation directory.  Default: /workspace/ComfyUI
#
# Usage:
#   bash scripts/install_custom_nodes.sh
#   COMFYUI_DIR=/opt/ComfyUI bash scripts/install_custom_nodes.sh
#
# Idempotent: existing repos are pulled/updated; requirements are re-installed.

set -euo pipefail

COMFYUI_DIR="${COMFYUI_DIR:-/workspace/ComfyUI}"
CUSTOM_NODES_DIR="${COMFYUI_DIR}/custom_nodes"
VENV_DIR="${COMFYUI_DIR}/venv"

if [ ! -d "${COMFYUI_DIR}" ]; then
    echo "ERROR: ComfyUI directory not found: ${COMFYUI_DIR}" >&2
    echo "       Run scripts/install_comfyui.sh first." >&2
    exit 1
fi

mkdir -p "${CUSTOM_NODES_DIR}"

# ── Activate venv ─────────────────────────────────────────────────────────────
if [ -f "${VENV_DIR}/bin/activate" ]; then
    # shellcheck source=/dev/null
    source "${VENV_DIR}/bin/activate"
    echo "==> [install_custom_nodes] Virtual environment activated."
else
    echo "WARNING: No venv found at ${VENV_DIR}. Using system Python." >&2
fi

# ── Helper: clone or pull a repo ─────────────────────────────────────────────
clone_or_update() {
    local name="$1"
    local url="$2"
    local target="${CUSTOM_NODES_DIR}/${name}"

    if [ -d "${target}/.git" ]; then
        echo "--> Updating ${name}..."
        git -C "${target}" pull --ff-only origin HEAD 2>/dev/null || \
            echo "    (could not fast-forward ${name} — skipping pull)"
    else
        echo "--> Cloning ${name}..."
        git clone --depth 1 "${url}" "${target}"
    fi

    # Install node-level requirements if present
    if [ -f "${target}/requirements.txt" ]; then
        echo "    Installing requirements for ${name}..."
        pip install --quiet -r "${target}/requirements.txt"
    fi

    # Run install.py if present (some nodes use this pattern)
    if [ -f "${target}/install.py" ]; then
        echo "    Running install.py for ${name}..."
        python "${target}/install.py" 2>/dev/null || true
    fi
}

echo "==> [install_custom_nodes] Installing custom nodes into: ${CUSTOM_NODES_DIR}"
echo ""

# ── Install each required custom node ────────────────────────────────────────
clone_or_update "ComfyUI_InstantID" \
    "https://github.com/cubiq/ComfyUI_InstantID.git"

clone_or_update "comfyui-rmbg" \
    "https://github.com/1038lab/ComfyUI-RMBG.git"

clone_or_update "comfyui-inpaint-cropandstitch" \
    "https://github.com/lquesada/ComfyUI-Inpaint-CropAndStitch.git"

clone_or_update "ComfyUI_UltimateSDUpscale" \
    "https://github.com/ssitu/ComfyUI_UltimateSDUpscale.git"

clone_or_update "comfyui_controlnet_aux" \
    "https://github.com/Fannovel16/comfyui_controlnet_aux.git"

clone_or_update "ComfyUI-KJNodes" \
    "https://github.com/kijai/ComfyUI-KJNodes.git"

clone_or_update "ComfyUI_essentials" \
    "https://github.com/cubiq/ComfyUI_essentials.git"

clone_or_update "rgthree-comfy" \
    "https://github.com/rgthree/rgthree-comfy.git"

echo ""
echo "==> [install_custom_nodes] All custom nodes installed."
echo "    Restart ComfyUI to load them."
