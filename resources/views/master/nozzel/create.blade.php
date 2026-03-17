@extends('layouts.app')
@section('title', 'Create Nozzle - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Create Nozzle</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('master.nozzle.index') }}">Nozzles</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('master.nozzle.index') }}" class="btn btn-secondary">
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
                            <label class="form-label">Nozzle Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter nozzle name" required>
                            <small class="text-muted">Unique identifier for nozzle</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nozzle Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="code" placeholder="e.g., NZL-001" required>
                            <small class="text-muted">Short code for reference</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Connected Dispenser <span class="text-danger">*</span></label>
                            <select class="form-select" name="dispenser_id" required>
                                <option value="">Select Dispenser</option>
                                <option value="1">Dispenser D1 - Zone A</option>
                                <option value="2">Dispenser D2 - Zone A</option>
                                <option value="3">Dispenser D3 - Zone B</option>
                                <option value="4">Dispenser D4 - Zone C</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fuel Type <span class="text-danger">*</span></label>
                            <select class="form-select" name="fuel_type" required>
                                <option value="">Select Fuel Type</option>
                                <option value="petrol">Petrol (Regular)</option>
                                <option value="diesel">Diesel</option>
                                <option value="premium">Premium Petrol</option>
                                <option value="cng">CNG</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Position <span class="text-danger">*</span></label>
                            <select class="form-select" name="position" required>
                                <option value="">Select Position</option>
                                <option value="1">Position 1</option>
                                <option value="2">Position 2</option>
                                <option value="3">Position 3</option>
                                <option value="4">Position 4</option>
                            </select>
                            <small class="text-muted">Position on dispenser</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Hose Length (m)</label>
                            <input type="number" class="form-control" name="hose_length" step="0.1" placeholder="0.0">
                            <small class="text-muted">Length in meters</small>
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
                            <label class="form-label">Nozzle Type <span class="text-danger">*</span></label>
                            <select class="form-select" name="nozzle_type" required>
                                <option value="">Select Type</option>
                                <option value="automatic">Automatic</option>
                                <option value="manual">Manual</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Flow Rate (L/min) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="flow_rate" placeholder="0" required>
                            <small class="text-muted">Maximum flow rate</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Manufacturer</label>
                            <select class="form-select" name="manufacturer">
                                <option value="">Select Manufacturer</option>
                                <option value="opw">OPW</option>
                                <option value="husky">Husky</option>
                                <option value="elaflex">Elaflex</option>
                                <option value="emco_wheaton">Emco Wheaton</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Model Number</label>
                            <input type="text" class="form-control" name="model" placeholder="Enter model">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Serial Number</label>
                            <input type="text" class="form-control" name="serial_number" placeholder="Enter serial number">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Inlet Size</label>
                            <select class="form-select" name="inlet_size">
                                <option value="">Select Size</option>
                                <option value="3/4">3/4 inch</option>
                                <option value="1">1 inch</option>
                                <option value="1.5">1.5 inch</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Maintenance & Calibration -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-tools me-2"></i>Maintenance & Calibration</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Installation Date</label>
                            <input type="date" class="form-control" name="installation_date">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last Calibration</label>
                            <input type="date" class="form-control" name="last_calibration">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Next Calibration Due</label>
                            <input type="date" class="form-control" name="next_calibration">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Calibration Interval (days)</label>
                            <input type="number" class="form-control" name="calibration_interval" placeholder="90">
                            <small class="text-muted">Default: 90 days</small>
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
                        <label class="form-label">Nozzle Status <span class="text-danger">*</span></label>
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
                        <input class="form-check-input" type="checkbox" id="breakaway" name="breakaway" checked>
                        <label class="form-check-label" for="breakaway">Breakaway Valve</label>
                    </div>
                </div>
            </div>

            <!-- Nozzle Info -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-info me-2"></i>Nozzle Info</h5>
                </div>
                <div class="card-body">
                    <div class="pricing-summary">
                        <div class="summary-row">
                            <span>Dispenser:</span>
                            <strong id="info-dispenser">-</strong>
                        </div>
                        <div class="summary-row">
                            <span>Fuel Type:</span>
                            <strong id="info-fuel">-</strong>
                        </div>
                        <div class="summary-row">
                            <span>Position:</span>
                            <strong id="info-position">-</strong>
                        </div>
                        <div class="summary-row">
                            <span>Flow Rate:</span>
                            <strong id="info-flow">-</strong>
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
                        <li>Check for leaks during inspection</li>
                        <li>Replace worn hoses promptly</li>
                        <li>Test auto shut-off mechanism</li>
                        <li>Keep nozzle clean and debris-free</li>
                    </ul>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary w-100 mb-2">
                        <i class="fas fa-save me-2"></i>Create Nozzle
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
    const dispenser = document.querySelector('select[name="dispenser_id"]');
    const fuelType = document.querySelector('select[name="fuel_type"]');
    const position = document.querySelector('select[name="position"]');
    const flowRate = document.querySelector('input[name="flow_rate"]');
    const status = document.querySelector('select[name="status"]');

    function updateInfo() {
        document.getElementById('info-dispenser').textContent = dispenser.options[dispenser.selectedIndex]?.text || '-';
        document.getElementById('info-fuel').textContent = fuelType.options[fuelType.selectedIndex]?.text || '-';
        document.getElementById('info-position').textContent = position.options[position.selectedIndex]?.text || '-';
        document.getElementById('info-flow').textContent = flowRate.value ? flowRate.value + ' L/min' : '-';
        document.getElementById('info-status').textContent = status.options[status.selectedIndex]?.text || 'Active';
    }

    dispenser.addEventListener('change', updateInfo);
    fuelType.addEventListener('change', updateInfo);
    position.addEventListener('change', updateInfo);
    flowRate.addEventListener('input', updateInfo);
    status.addEventListener('change', updateInfo);
});
</script>
@endpush
@endsection
