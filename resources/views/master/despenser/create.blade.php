@extends('layouts.app')
@section('title', 'Create Dispenser - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Create Dispenser</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('master.dispenser.index') }}">Dispensers</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('master.dispenser.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>
</div>

<form action="#" method="POST">
    @csrf
    <div class="row">
        <!-- Main Form -->
        <div class="col-lg-8">
            <!-- Basic Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Basic Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Dispenser Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter dispenser name" required>
                            <small class="text-muted">Unique identifier for dispenser</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Dispenser Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="code" placeholder="e.g., DSP-001" required>
                            <small class="text-muted">Short code for reference</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Connected Tank <span class="text-danger">*</span></label>
                            <select class="form-select" name="tank_id" required>
                                <option value="">Select Tank</option>
                                <option value="1">Tank A1 - Petrol</option>
                                <option value="2">Tank A2 - Diesel</option>
                                <option value="3">Tank B1 - Premium</option>
                                <option value="4">Tank C1 - Diesel</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Location <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="location" placeholder="e.g., Zone A - Bay 1" required>
                            <small class="text-muted">Physical location</small>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter dispenser description"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technical Specifications -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Technical Specifications</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Manufacturer <span class="text-danger">*</span></label>
                            <select class="form-select" name="manufacturer" required>
                                <option value="">Select Manufacturer</option>
                                <option value="gilbarco">Gilbarco</option>
                                <option value="wayne">Wayne</option>
                                <option value="tokheim">Tokheim</option>
                                <option value="tatsuno">Tatsuno</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Model <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="model" placeholder="e.g., Encore 500" required>
                            <small class="text-muted">Dispenser model number</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Serial Number</label>
                            <input type="text" class="form-control" name="serial_number" placeholder="Enter serial number">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Number of Nozzles <span class="text-danger">*</span></label>
                            <select class="form-select" name="nozzle_count" required>
                                <option value="">Select Count</option>
                                <option value="2">2 Nozzles</option>
                                <option value="4">4 Nozzles</option>
                                <option value="6">6 Nozzles</option>
                                <option value="8">8 Nozzles</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Flow Rate (L/min)</label>
                            <input type="number" class="form-control" name="flow_rate" placeholder="0">
                            <small class="text-muted">Maximum flow rate</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Meter Type</label>
                            <select class="form-select" name="meter_type">
                                <option value="">Select Type</option>
                                <option value="mechanical">Mechanical</option>
                                <option value="electronic">Electronic</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Maintenance Details -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-tools me-2"></i>Maintenance Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Installation Date</label>
                            <input type="date" class="form-control" name="installation_date">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last Service Date</label>
                            <input type="date" class="form-control" name="last_service_date">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Next Service Due</label>
                            <input type="date" class="form-control" name="next_service_date">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Calibration Date</label>
                            <input type="date" class="form-control" name="calibration_date">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Status Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-toggle-on me-2"></i>Status</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Dispenser Status <span class="text-danger">*</span></label>
                        <select class="form-select" name="status" required>
                            <option value="active">Active</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="auto_shutoff" name="auto_shutoff" checked>
                        <label class="form-check-label" for="auto_shutoff">Auto Shut-off</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="vapor_recovery" name="vapor_recovery">
                        <label class="form-check-label" for="vapor_recovery">Vapor Recovery</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="card_reader" name="card_reader" checked>
                        <label class="form-check-label" for="card_reader">Card Reader</label>
                    </div>
                </div>
            </div>

            <!-- Dispenser Info -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-info me-2"></i>Dispenser Info</h5>
                </div>
                <div class="card-body">
                    <div class="pricing-summary">
                        <div class="summary-row">
                            <span>Manufacturer:</span>
                            <strong id="info-manufacturer">-</strong>
                        </div>
                        <div class="summary-row">
                            <span>Model:</span>
                            <strong id="info-model">-</strong>
                        </div>
                        <div class="summary-row">
                            <span>Nozzles:</span>
                            <strong id="info-nozzles">-</strong>
                        </div>
                        <div class="summary-row">
                            <span>Connected Tank:</span>
                            <strong id="info-tank">-</strong>
                        </div>
                        <div class="summary-row total">
                            <span>Status:</span>
                            <strong id="info-status" class="text-success">Active</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Tips -->
            <div class="card mb-4 tips-card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-lightbulb me-2"></i>Quick Tips</h5>
                </div>
                <div class="card-body">
                    <ul class="tips-list">
                        <li>Regular calibration ensures accuracy</li>
                        <li>Schedule preventive maintenance</li>
                        <li>Monitor nozzle performance daily</li>
                        <li>Keep service records updated</li>
                        <li>Test emergency shut-off regularly</li>
                    </ul>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary w-100 mb-2">
                        <i class="fas fa-save me-2"></i>Create Dispenser
                    </button>
                    <button type="reset" class="btn btn-secondary w-100">
                        <i class="fas fa-redo me-2"></i>Reset Form
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const manufacturer = document.querySelector('select[name="manufacturer"]');
    const model = document.querySelector('input[name="model"]');
    const nozzles = document.querySelector('select[name="nozzle_count"]');
    const tank = document.querySelector('select[name="tank_id"]');
    const status = document.querySelector('select[name="status"]');

    function updateInfo() {
        document.getElementById('info-manufacturer').textContent = manufacturer.options[manufacturer.selectedIndex]?.text || '-';
        document.getElementById('info-model').textContent = model.value || '-';
        document.getElementById('info-nozzles').textContent = nozzles.options[nozzles.selectedIndex]?.text || '-';
        document.getElementById('info-tank').textContent = tank.options[tank.selectedIndex]?.text || '-';
        document.getElementById('info-status').textContent = status.options[status.selectedIndex]?.text || 'Active';
    }

    manufacturer.addEventListener('change', updateInfo);
    model.addEventListener('input', updateInfo);
    nozzles.addEventListener('change', updateInfo);
    tank.addEventListener('change', updateInfo);
    status.addEventListener('change', updateInfo);
});
</script>
@endpush
@endsection
