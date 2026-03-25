# Workflow Validation and Troubleshooting

This document describes how to validate that the ComfyUI workflow loads correctly
and how to troubleshoot the most common errors.

---

## Table of Contents

1. [Pre-flight Checklist](#pre-flight-checklist)
2. [Importing the Workflow JSON](#importing-the-workflow-json)
3. [Validating — No Missing Nodes](#validating--no-missing-nodes)
4. [Validating — No Missing Models](#validating--no-missing-models)
5. [Running a Test Generation](#running-a-test-generation)
6. [Common Errors and Fixes](#common-errors-and-fixes)
7. [VRAM / Memory Errors](#vram--memory-errors)
8. [Checking ComfyUI Logs](#checking-comfyui-logs)

---

## Pre-flight Checklist

Before opening the workflow in the browser, confirm the following:

- [ ] ComfyUI is installed and running (`bash scripts/run_comfyui.sh`).
- [ ] All custom nodes are installed (`bash scripts/install_custom_nodes.sh`).
- [ ] All model files are present in the correct `models/` subfolders
      (`bash scripts/link_models.sh` — check its output for `[MISSING]` lines).
- [ ] The pod port (default `8188`) is exposed in the RunPod pod settings.
- [ ] You have a test input image ready (a clear face photo works best for InstantID flows).

---

## Importing the Workflow JSON

**Method A — Drag and drop:**
1. Open ComfyUI at `http://<POD_IP>:8188`.
2. Drag the workflow `.json` file from your local machine onto the ComfyUI canvas.

**Method B — Load button:**
1. Click **Load** in the top menu.
2. Select the workflow `.json` file.

**Method C — Place the file directly:**
Copy the JSON to:
```
ComfyUI/user/default/workflows/<workflow_name>.json
```
Then reload the page. The workflow will appear under the **Workflows** panel.

---

## Validating — No Missing Nodes

After loading the workflow:

1. Look for any **red-outlined nodes** on the canvas. These indicate that the custom node plugin providing that node type is not installed.
2. Hover over the red node to see the **node class name** (e.g., `InstantIDFaceAnalysis`).
3. Map the class name to the correct custom node repo:

| Node class prefix | Custom node repo |
|---|---|
| `InstantID*` | `ComfyUI_InstantID` |
| `RMBG*` / `SAM3*` | `comfyui-rmbg` |
| `InpaintCrop*` / `InpaintStitch*` | `comfyui-inpaint-cropandstitch` |
| `UltimateSDUpscale*` | `ComfyUI_UltimateSDUpscale` |
| `AIO_Preprocessor` / `*Preprocessor` / `ControlNetApply*` | `comfyui_controlnet_aux` |
| `KJ*` | `ComfyUI-KJNodes` |
| `ImageResize*` / `MaskBlur*` (essentials) | `ComfyUI_essentials` |
| `RgthreeContext*` / `Power Lora Loader*` | `rgthree-comfy` |

4. Re-run `bash scripts/install_custom_nodes.sh` and restart ComfyUI.
5. Reload the workflow. Red nodes should now render correctly.

---

## Validating — No Missing Models

After loading the workflow without red nodes:

1. Open the **browser console** (F12 → Console) or watch the **ComfyUI terminal output** for any warning like:
   ```
   ERROR: Could not find <filename>
   ```
2. In the UI, model-loader nodes (e.g., `Load Checkpoint`, `UNETLoader`, `LoRALoader`)
   will show a dropdown. If the required filename is **not listed**, the file is missing.
3. Cross-reference with the folder structure in [README.md](../README.md#comfyui-model-folder-structure).
4. Re-run `bash scripts/link_models.sh` to see which files are `[MISSING]`, then
   download/place the file and re-run the script.

---

## Running a Test Generation

1. Confirm there are no red nodes and no missing model dropdowns.
2. Load a **test input image** into every `Load Image` node in the workflow.
3. Review all text prompt nodes and confirm they contain valid content.
4. Click **Queue Prompt** (or press `Ctrl+Enter`).
5. Watch the progress bar and the **terminal** for errors.
6. A successful run produces an output image visible in the `Preview Image` / `Save Image` node.
7. Check the output image visually:
   - Face identity preserved (InstantID branch).
   - Background removed cleanly (RMBG branch).
   - Inpainted area blends correctly (Inpaint crop/stitch branch).
   - Upscaled output is sharp and consistent (UltimateSDUpscale branch).

---

## Common Errors and Fixes

### `ERROR: Could not find checkpoint: CHEYENNE_v16.safetensors`

The checkpoint file is missing. Ensure:
- The file is in `ComfyUI/models/checkpoints/CHEYENNE_v16.safetensors`.
- `link_models.sh` was run and the source path exists in `MODEL_STORE`.

### `KeyError: 'InstantIDFaceAnalysis'` or similar node error

A custom node was not loaded. Reasons:
- The node's `requirements.txt` failed to install (check the ComfyUI startup log for pip errors).
- The repo was cloned but `git pull` failed silently.

**Fix:** Re-run `bash scripts/install_custom_nodes.sh` with the terminal open to see errors.

### `RuntimeError: CUDA out of memory`

See [VRAM / Memory Errors](#vram--memory-errors) below.

### `FileNotFoundError: [Errno 2] No such file or directory: '.../insightface/...'`

The `insightface` Python package (required by InstantID) is missing or failed to build.

**Fix:**
```bash
source /workspace/ComfyUI/venv/bin/activate
pip install insightface onnxruntime-gpu
```

### `ModuleNotFoundError: No module named 'cv2'`

OpenCV is missing (needed by `comfyui_controlnet_aux`).

**Fix:**
```bash
source /workspace/ComfyUI/venv/bin/activate
pip install opencv-python-headless
```

### Workflow loads but outputs a black/corrupted image

Common causes:
- Wrong VAE — confirm `sdxl_vae.safetensors` is the correct SDXL VAE (not an SD 1.5 VAE).
- Mismatched model variant — e.g., using the `fp8` Qwen UNet when the workflow expects `bf16`.

**Fix:** Confirm model filenames with the client and rename/replace as needed.

### `diffusion_pytorch_model.safetensors` is the wrong ControlNet

There are many files with this generic name across Hugging Face. If InstantID face guidance is not working:
- Confirm the source repository with the client.
- The correct file is typically from `InstantX/InstantID` → `ControlNetModel/diffusion_pytorch_model.safetensors`.

---

## VRAM / Memory Errors

This workflow uses multiple heavy components (SDXL checkpoint, Qwen UNet, InstantID, ControlNet, upscaler). Expected VRAM usage:

| Stage | Approx. VRAM |
|---|---|
| SDXL + ControlNet pass | ~12–18 GB |
| Qwen UNet (bf16) | ~16–20 GB |
| InstantID face analysis | ~2–4 GB extra |
| UltimateSDUpscale (tiled) | ~6–10 GB |

If you see `CUDA out of memory`:

1. **Try a lower-VRAM-friendly flag:**
   ```bash
   EXTRA_ARGS="--fp16 --lowvram" bash scripts/run_comfyui.sh
   ```
2. **Switch to a higher-VRAM GPU** (A40 48 GB recommended if 4090 24 GB OOMs).
3. **Reduce tile size** in the UltimateSDUpscale node (lower tile width/height).
4. **Process branches sequentially** rather than in parallel if the workflow graph allows.

---

## Checking ComfyUI Logs

The ComfyUI terminal (where you ran `run_comfyui.sh`) shows:
- Node loading errors at startup.
- Model loading errors when a workflow is queued.
- Python tracebacks for any runtime failure.

Always keep the terminal visible when testing. Copy the full traceback when reporting issues.

For deeper debugging, add `--verbose` to `EXTRA_ARGS`:
```bash
EXTRA_ARGS="--verbose" bash scripts/run_comfyui.sh
```
