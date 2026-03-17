@extends('layouts.app')
@section('title', 'Create Fuel Tank - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Create Fuel Tank</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('master.tank.index') }}">Fuel Tanks</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('master.tank.index') }}" class="btn btn-secondary">
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
                            <label class="form-label">Tank Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter tank name" required>
                            <small class="text-muted">Unique identifier for the tank</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tank Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="code" placeholder="e.g., TK-A1" required>
                            <small class="text-muted">Short code for reference</small>
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
                            <label class="form-label">Location <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="location" placeholder="e.g., Zone A" required>
                            <small class="text-muted">Physical location of tank</small>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter tank description"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Capacity & Stock -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-tint me-2"></i>Capacity & Stock</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Total Capacity (L) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="capacity" placeholder="0" required>
                            <small class="text-muted">Maximum capacity in liters</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Current Stock (L) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="current_stock" placeholder="0" required>
                            <small class="text-muted">Current fuel quantity</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Fill Level (%)</label>
                            <input type="number" class="form-control" name="fill_level" placeholder="0" readonly>
                            <small class="text-muted">Auto-calculated</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Minimum Stock Alert (L)</label>
                            <input type="number" class="form-control" name="min_stock" placeholder="0">
                            <small class="text-muted">Alert when stock falls below</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Maximum Stock Alert (L)</label>
                            <input type="number" class="form-control" name="max_stock" placeholder="0">
                            <small class="text-muted">Alert when stock exceeds</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technical Details -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Technical Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tank Type</label>
                            <select class="form-select" name="tank_type">
                                <option value="">Select Type</option>
                                <option value="underground">Underground</option>
                                <option value="above_ground">Above Ground</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Material</label>
                            <select class="form-select" name="material">
                                <option value="">Select Material</option>
                                <option value="steel">Steel</option>
                                <option value="fiberglass">Fiberglass</option>
                                <option value="concrete">Concrete</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Installation Date</label>
                            <input type="date" class="form-control" name="installation_date">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last Inspection Date</label>
                            <input type="date" class="form-control" name="last_inspection">
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
                        <label class="form-label">Tank Status <span class="text-danger">*</span></label>
                        <select class="form-select" name="status" required>
                            <option value="active">Active</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="auto_refill" name="auto_refill">
                        <label class="form-check-label" for="auto_refill">Auto Refill Alert</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="leak_detection" name="leak_detection" checked>
                        <label class="form-check-label" for="leak_detection">Leak Detection</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="temperature_monitor" name="temperature_monitor">
                        <label class="form-check-label" for="temperature_monitor">Temperature Monitor</label>
                    </div>
                </div>
            </div>

            <!-- Tank Summary -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Tank Summary</h5>
                </div>
                <div class="card-body">
                    <div class="pricing-summary">
                        <div class="summary-row">
                            <span>Total Capacity:</span>
                            <strong id="summary-capacity">0 L</strong>
                        </div>
                        <div class="summary-row">
                            <span>Current Stock:</span>
                            <strong id="summary-stock">0 L</strong>
                        </div>
                        <div class="summary-row">
                            <span>Available Space:</span>
                            <strong id="summary-available">0 L</strong>
                        </div>
                        <div class="summary-row total">
                            <span>Fill Level:</span>
                            <strong id="summary-level" class="text-success">0%</strong>
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
                        <li>Regular inspection prevents leaks</li>
                        <li>Monitor stock levels daily</li>
                        <li>Set appropriate alert thresholds</li>
                        <li>Maintain proper documentation</li>
                        <li>Schedule periodic maintenance</li>
                    </ul>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary w-100 mb-2">
                        <i class="fas fa-save me-2"></i>Create Tank
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
    const capacity = document.querySelector('input[name="capacity"]');
    const currentStock = document.querySelector('input[name="current_stock"]');
    const fillLevel = document.querySelector('input[name="fill_level"]');

    function calculateTankStats() {
        const cap = parseFloat(capacity.value) || 0;
        const stock = parseFloat(currentStock.value) || 0;
        
        // Calculate fill level
        const level = cap > 0 ? ((stock / cap) * 100).toFixed(2) : 0;
        fillLevel.value = level;
        
        // Calculate available space
        const available = cap - stock;
        
        // Update summary
        document.getElementById('summary-capacity').textContent = cap + ' L';
        document.getElementById('summary-stock').textContent = stock + ' L';
        document.getElementById('summary-available').textContent = available + ' L';
        document.getElementById('summary-level').textContent = level + '%';
    }

    capacity.addEventListener('input', calculateTankStats);
    currentStock.addEventListener('input', calculateTankStats);
});
</script>
@endpush
@endsection
