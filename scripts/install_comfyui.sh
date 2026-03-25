#!/usr/bin/env bash
# install_comfyui.sh
#
# Clones ComfyUI into COMFYUI_DIR, optionally checks out a pinned commit,
# creates/activates a Python virtual environment, and installs requirements.
#
# Environment variables (all optional — sensible defaults provided):
#   COMFYUI_DIR     Target installation directory.  Default: /workspace/ComfyUI
#   COMFYUI_COMMIT  Git commit SHA or branch to checkout.  Default: (latest main)
#   PYTHON          Python executable to use.           Default: python3
#
# Usage:
#   bash scripts/install_comfyui.sh
#   COMFYUI_DIR=/opt/ComfyUI COMFYUI_COMMIT=abc1234 bash scripts/install_comfyui.sh
#
# Idempotent: safe to re-run. Re-running will pull the latest changes (or stay
# on the pinned commit) and re-install requirements if needed.

set -euo pipefail

COMFYUI_DIR="${COMFYUI_DIR:-/workspace/ComfyUI}"
COMFYUI_COMMIT="${COMFYUI_COMMIT:-}"
PYTHON="${PYTHON:-python3}"
REPO_URL="https://github.com/comfyanonymous/ComfyUI.git"

echo "==> [install_comfyui] Target directory: ${COMFYUI_DIR}"

# ── Clone or update ──────────────────────────────────────────────────────────
if [ -d "${COMFYUI_DIR}/.git" ]; then
    echo "==> [install_comfyui] Repository already exists — fetching updates..."
    git -C "${COMFYUI_DIR}" fetch --quiet origin
else
    echo "==> [install_comfyui] Cloning ComfyUI..."
    git clone "${REPO_URL}" "${COMFYUI_DIR}"
fi

# ── Pin commit if specified ───────────────────────────────────────────────────
if [ -n "${COMFYUI_COMMIT}" ]; then
    echo "==> [install_comfyui] Checking out commit/branch: ${COMFYUI_COMMIT}"
    git -C "${COMFYUI_DIR}" checkout "${COMFYUI_COMMIT}"
else
    echo "==> [install_comfyui] No commit pinned — using latest on current branch."
    git -C "${COMFYUI_DIR}" pull --ff-only origin HEAD 2>/dev/null || true
fi

# ── Virtual environment ───────────────────────────────────────────────────────
VENV_DIR="${COMFYUI_DIR}/venv"
if [ ! -d "${VENV_DIR}" ]; then
    echo "==> [install_comfyui] Creating virtual environment at ${VENV_DIR}..."
    "${PYTHON}" -m venv "${VENV_DIR}"
fi

# shellcheck source=/dev/null
source "${VENV_DIR}/bin/activate"
echo "==> [install_comfyui] Virtual environment activated."

# ── Install/update requirements ───────────────────────────────────────────────
echo "==> [install_comfyui] Installing/updating pip..."
pip install --quiet --upgrade pip

echo "==> [install_comfyui] Installing ComfyUI requirements..."
pip install --quiet -r "${COMFYUI_DIR}/requirements.txt"

# Optional: install xformers for memory-efficient attention (skip if unavailable)
if pip install --quiet xformers 2>/dev/null; then
    echo "==> [install_comfyui] xformers installed."
else
    echo "==> [install_comfyui] xformers not available for this CUDA version — skipping."
fi

echo ""
echo "==> [install_comfyui] Done. ComfyUI installed at: ${COMFYUI_DIR}"
echo "    To start: bash scripts/run_comfyui.sh"
