# RunPod + ComfyUI Setup Guide

This guide walks you through setting up a **RunPod Pod with a Network Volume** to run a ComfyUI workflow interactively, and prepares the environment for a later migration to RunPod Serverless API endpoints.

---

## Table of Contents

1. [What is RunPod?](#what-is-runpod)
2. [What is ComfyUI?](#what-is-comfyui)
3. [What is a Network Volume?](#what-is-a-network-volume)
4. [Recommended GPU Choices](#recommended-gpu-choices)
5. [Mounting an Existing Network Storage](#mounting-an-existing-network-storage)
6. [ComfyUI Model Folder Structure](#comfyui-model-folder-structure)
7. [Importing and Testing a Workflow JSON](#importing-and-testing-a-workflow-json)
8. [Quick-Start with Scripts](#quick-start-with-scripts)
9. [Client Information Checklist](#client-information-checklist)
10. [Phase 2: Serverless Migration Notes](#phase-2-serverless-migration-notes)

---

## What is RunPod?

[RunPod](https://www.runpod.io/) is a **cloud GPU rental platform**. Instead of owning an expensive GPU, you rent one by the hour. Key concepts:

| Concept | Description |
|---|---|
| **Pod** | A temporary GPU-backed virtual machine. You pay per hour while it is running. Stop it when not in use to save cost. |
| **Network Volume** | A **persistent disk** you attach to pods. Everything you install (ComfyUI, models, custom nodes) lives here and survives pod restarts/deletions. |
| **Serverless Endpoint** | A pay-per-second API that runs your workflow headlessly without a persistent pod. Ideal for production after testing. |

---

## What is ComfyUI?

[ComfyUI](https://github.com/comfyanonymous/ComfyUI) is an open-source, **node-based web interface** for Stable Diffusion and related diffusion models. You build generation pipelines by connecting nodes (e.g., "Load Checkpoint", "CLIP Text Encode", "KSampler", "VAE Decode", "Save Image").

Workflows can be exported as **JSON files**. A workflow JSON describes the full node graph, including:
- Which models and checkpoints to load (by filename).
- Which custom node plugins are required.
- All sampler settings, prompts, and processing steps.

The JSON does **not** bundle the model files themselves — you must install those separately.

---

## What is a Network Volume?

A **Network Volume** is a persistent block-storage disk on RunPod. Using one means:

- You install ComfyUI, custom nodes, and models **once**.
- You can stop/terminate pods without losing anything.
- You can swap GPU types (e.g., from 4090 to A40) by simply re-attaching the volume to a new pod.
- You avoid paying GPU time for repeated downloads on every session.

**Recommended starting size: ≤ 200 GB** for initial testing with SDXL + ControlNet + Qwen assets. If you have a separate network storage with most models already present, you may need far less additional space (mainly for custom nodes and any missing models).

---

## Recommended GPU Choices

### Phase 1 — Interactive Testing (Traditional Pod)

| GPU | VRAM | Notes |
|---|---|---|
| **RTX 4090** | 24 GB | Best value for testing; widely available on RunPod. Recommended starting point. |
| **RTX 3090** | 24 GB | Cheaper per hour; slightly slower but cost-effective if speed is not a concern. |
| **A40** | 48 GB | Good if the workflow OOMs on 24 GB (InstantID + Qwen stack can spike VRAM). |
| **RTX 5090** *(if available)* | 32 GB | Fastest consumer option; select only if listed in your RunPod region. |

> **Cost tip:** Start with a 4090 or 3090. Switch to a higher-VRAM GPU only if you encounter out-of-memory (OOM) errors.

### Phase 2 — Serverless API (Later)

| GPU | Notes |
|---|---|
| **RTX 4090** | Pay-per-second, good balance of cost and throughput. |
| **A100 / L40S** | Higher VRAM; use if batching or large resolutions are needed. |

---

## Mounting an Existing Network Storage

If the client already has a RunPod Network Volume containing most required models, attach it alongside your working volume:

1. In the **RunPod console**, go to **Network Volumes** and note the ID of the existing model storage.
2. When configuring your new pod, add the existing volume as an **additional mount** (RunPod supports mounting multiple volumes). Choose a distinct mount path, for example:
   - Working volume: `/workspace`
   - Client model storage: `/models-store`
3. Use `scripts/link_models.sh` (see below) to create symlinks from the ComfyUI `models/` subfolders into `/models-store`, so ComfyUI can read the models without copying them.

> **Note:** If RunPod does not allow dual-volume mounting in your configuration, copy the needed files from the client volume to your working volume using `rsync` or `cp`.

---

## ComfyUI Model Folder Structure

ComfyUI expects models in specific subdirectories under `<COMFYUI_DIR>/models/`. The workflow JSON references models by filename within these folders.

```
ComfyUI/
└── models/
    ├── checkpoints/          # Main SD/SDXL checkpoints (.safetensors)
    │   └── CHEYENNE_v16.safetensors          # PLACEHOLDER — provide download link
    ├── vae/                  # VAE weights
    │   ├── sdxl_vae.safetensors              # PLACEHOLDER — confirm exact source
    │   └── qwen_image_vae.safetensors
    ├── loras/                # LoRA add-ons
    │   ├── Qwen-Image-2512-Lightning-8steps-V1.0-bf16.safetensors
    │   ├── Qwen-Image-Edit-2511-Lightning-4steps-V1.0-bf16.safetensors
    │   └── trainings/
    │       └── qwen2512_161imgs_detailed/
    │           └── 750.safetensors           # PRIVATE — client must upload
    ├── controlnet/           # ControlNet weights
    │   ├── diffusion_pytorch_model.safetensors  # InstantID CN — confirm exact repo
    │   └── controlnetTile.safetensors
    ├── upscale_models/       # Upscaler weights
    │   └── 4x-UltraSharp.pth
    ├── clip/                 # CLIP / text encoder weights
    │   └── qwen_2.5_vl_7b_fp8_scaled.safetensors
    └── diffusion_models/     # UNet-only weights (used by UNETLoader node)
        ├── qwen_image_2512_bf16.safetensors  # confirm exact filename with client
        └── qwen_image_edit_2511_bf16.safetensors
```

> All entries marked **PLACEHOLDER** or **PRIVATE** require a download link or upload from the client before setup can be completed.

---

## Importing and Testing a Workflow JSON

1. Start ComfyUI using `scripts/run_comfyui.sh` (or manually: `python main.py --listen 0.0.0.0 --port 8188`).
2. Open the ComfyUI web UI in your browser at `http://<POD_IP>:8188`.
3. Drag-and-drop the workflow JSON file onto the canvas, **or** use **Load** from the top menu.
4. Check for errors:
   - **Red nodes** = missing custom node plugin (run `scripts/install_custom_nodes.sh`).
   - **"model not found"** warnings = a model file is missing or misnamed (verify paths in the folder structure above).
5. Provide a test input image when prompted by loader nodes.
6. Click **Queue Prompt** and monitor the terminal for progress and errors.
7. Confirm at least one full successful run before declaring setup complete.

See [`docs/WORKFLOW.md`](docs/WORKFLOW.md) for detailed validation steps and troubleshooting.

---

## Quick-Start with Scripts

All scripts live in the `scripts/` directory and are idempotent (safe to re-run).

```bash
# 1. Clone and install ComfyUI
bash scripts/install_comfyui.sh

# 2. Install required custom nodes
bash scripts/install_custom_nodes.sh

# 3. Link models from existing network storage into ComfyUI folders
bash scripts/link_models.sh

# 4. Start ComfyUI
bash scripts/run_comfyui.sh
```

Each script accepts environment variables to customise paths. See the script headers for details.

---

## Client Information Checklist

Before setup can be completed, the following information is required from the client:

- [ ] **ComfyUI version/commit** — exact commit SHA to pin, or confirm "use latest".
- [ ] **Download link** for `CHEYENNE_v16.safetensors`.
- [ ] **Download link** for `sdxl_vae.safetensors` — confirm the exact source repository.
- [ ] **Download link** for the InstantID ControlNet `diffusion_pytorch_model.safetensors` — include the exact Hugging Face repo URL to avoid using the wrong variant.
- [ ] **Download link** for `controlnetTile.safetensors`.
- [ ] **Download link** for `4x-UltraSharp.pth` (publicly available on various model hubs; confirm preferred source).
- [ ] **Upload or secure link** for private LoRA: `trainings/qwen2512_161imgs_detailed/750.safetensors`.
- [ ] **Confirm Qwen UNet filename**: workflow may reference either `qwen_image_2512_fp8_e4m3fn.safetensors` (fp8 variant) or `qwen_image_2512_bf16.safetensors` (bf16 variant) — clarify which file you have and provide its download link. The `scripts/link_models.sh` script links the bf16 variant by default; uncomment the fp8 line in the script if the fp8 variant is used instead.
- [ ] **RunPod region preference** (optional, affects GPU availability and price).
- [ ] **Network Volume size preference** — recommended start: ≤ 200 GB.
- [ ] **Test input image** — provide a sample face/subject image to validate the workflow end-to-end.

---

## Phase 2: Serverless Migration Notes

Once the workflow is validated on a traditional pod, migrating to a RunPod Serverless endpoint involves:

1. **Package the environment** — create a Docker image based on the network volume state (ComfyUI + custom nodes + models baked in or fetched at cold-start).
2. **Write a serverless handler** — a Python script that accepts JSON input (prompt, image, seed, etc.), runs the ComfyUI workflow headlessly via the `--headless` flag or the `comfy-script` API, and returns the output image.
3. **Push the Docker image** to a container registry (e.g., Docker Hub or RunPod's own registry).
4. **Create a Serverless Endpoint** in the RunPod console pointing to the image.
5. **Test via API** using RunPod's REST API or SDK.

This is out of scope for Phase 1. A separate quote will be provided for Phase 2.
