#!/usr/bin/env bash
# run_comfyui.sh
#
# Starts ComfyUI on a specified host and port.
#
# Environment variables:
#   COMFYUI_DIR   ComfyUI installation directory.  Default: /workspace/ComfyUI
#   COMFYUI_HOST  Interface to listen on.           Default: 0.0.0.0
#   COMFYUI_PORT  Port to listen on.                Default: 8188
#   EXTRA_ARGS    Any additional flags to pass to ComfyUI (e.g., "--fp16").
#
# Usage:
#   bash scripts/run_comfyui.sh
#   COMFYUI_PORT=8080 bash scripts/run_comfyui.sh
#
# To access ComfyUI from outside the pod, ensure port COMFYUI_PORT is exposed
# in the RunPod pod configuration (HTTP port mapping).

set -euo pipefail

COMFYUI_DIR="${COMFYUI_DIR:-/workspace/ComfyUI}"
COMFYUI_HOST="${COMFYUI_HOST:-0.0.0.0}"
COMFYUI_PORT="${COMFYUI_PORT:-8188}"
EXTRA_ARGS="${EXTRA_ARGS:-}"
VENV_DIR="${COMFYUI_DIR}/venv"

# ── Validate ──────────────────────────────────────────────────────────────────
if [ ! -d "${COMFYUI_DIR}" ]; then
    echo "ERROR: ComfyUI directory not found: ${COMFYUI_DIR}" >&2
    echo "       Run scripts/install_comfyui.sh first." >&2
    exit 1
fi

if [ ! -f "${COMFYUI_DIR}/main.py" ]; then
    echo "ERROR: main.py not found in ${COMFYUI_DIR}." >&2
    echo "       The ComfyUI installation may be incomplete." >&2
    exit 1
fi

# ── Activate venv ─────────────────────────────────────────────────────────────
if [ -f "${VENV_DIR}/bin/activate" ]; then
    # shellcheck source=/dev/null
    source "${VENV_DIR}/bin/activate"
fi

echo "==> [run_comfyui] Starting ComfyUI..."
echo "    Directory : ${COMFYUI_DIR}"
echo "    Listen on : ${COMFYUI_HOST}:${COMFYUI_PORT}"
echo ""
echo "    Open in browser: http://<YOUR_POD_IP>:${COMFYUI_PORT}"
echo "    (Expose port ${COMFYUI_PORT} in RunPod pod settings if accessing remotely.)"
echo ""

# ── Launch ────────────────────────────────────────────────────────────────────
cd "${COMFYUI_DIR}"
# shellcheck disable=SC2086
exec python main.py \
    --listen "${COMFYUI_HOST}" \
    --port "${COMFYUI_PORT}" \
    ${EXTRA_ARGS}
