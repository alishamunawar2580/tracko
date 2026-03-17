@extends('layouts.app')
@section('title', 'Add Meter Reading - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Add Meter Reading</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('master.meter.index') }}">Meters</a></li>
                    <li class="breadcrumb-item active">Add Reading</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('master.meter.index') }}" class="btn btn-secondary">
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
            <!-- Reading Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Reading Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Select Nozzle <span class="text-danger">*</span></label>
                            <select class="form-select" name="nozzle_id" required>
                                <option value="">Choose Nozzle</option>
                                <option value="1">Nozzle N1-A - Dispenser D1 (Petrol)</option>
                                <option value="2">Nozzle N1-B - Dispenser D1 (Petrol)</option>
                                <option value="3">Nozzle N2-A - Dispenser D2 (Diesel)</option>
                                <option value="4">Nozzle N3-A - Dispenser D3 (Premium)</option>
                            </select>
                            <small class="text-muted">Select nozzle for reading</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Reading Date & Time <span class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control" name="reading_datetime" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Shift <span class="text-danger">*</span></label>
                            <select class="form-select" name="shift" required>
                                <option value="">Select Shift</option>
                                <option value="morning">Morning (6 AM - 2 PM)</option>
                                <option value="afternoon">Afternoon (2 PM - 10 PM)</option>
                                <option value="night">Night (10 PM - 6 AM)</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Recorded By <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="recorded_by" placeholder="Enter name" required>
                            <small class="text-muted">Staff member name</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Meter Readings -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-tachometer-alt me-2"></i>Meter Readings</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Opening Reading (L) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="opening_reading" step="0.1" placeholder="0.0" required>
                            <small class="text-muted">Starting meter reading</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Closing Reading (L) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="closing_reading" step="0.1" placeholder="0.0" required>
                            <small class="text-muted">Ending meter reading</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Total Dispensed (L)</label>
                            <input type="number" class="form-control" name="total_dispensed" step="0.1" placeholder="0.0" readonly>
                            <small class="text-muted">Auto-calculated</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Price per Liter</label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" name="price_per_liter" step="0.01" placeholder="0.00">
                            </div>
                            <small class="text-muted">Current fuel price</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Total Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" name="total_amount" step="0.01" placeholder="0.00" readonly>
                            </div>
                            <small class="text-muted">Auto-calculated</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Testing Quantity (L)</label>
                            <input type="number" class="form-control" name="testing_quantity" step="0.1" placeholder="0.0">
                            <small class="text-muted">Fuel used for testing</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Details -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-clipboard me-2"></i>Additional Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tank Stock Before (L)</label>
                            <input type="number" class="form-control" name="tank_stock_before" step="0.1" placeholder="0.0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tank Stock After (L)</label>
                            <input type="number" class="form-control" name="tank_stock_after" step="0.1" placeholder="0.0">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Remarks</label>
                            <textarea class="form-control" name="remarks" rows="3" placeholder="Add any notes or observations"></textarea>
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
                        <label class="form-label">Reading Status <span class="text-danger">*</span></label>
                        <select class="form-select" name="status" required>
                            <option value="pending">Pending Verification</option>
                            <option value="verified">Verified</option>
                            <option value="discrepancy">Discrepancy</option>
                        </select>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="auto_verify" name="auto_verify">
                        <label class="form-check-label" for="auto_verify">Auto Verify</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="send_alert" name="send_alert" checked>
                        <label class="form-check-label" for="send_alert">Send Alert on Discrepancy</label>
                    </div>
                </div>
            </div>

            <!-- Reading Summary -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-calculator me-2"></i>Reading Summary</h5>
                </div>
                <div class="card-body">
                    <div class="pricing-summary">
                        <div class="summary-row">
                            <span>Opening:</span>
                            <strong id="summary-opening">0.0 L</strong>
                        </div>
                        <div class="summary-row">
                            <span>Closing:</span>
                            <strong id="summary-closing">0.0 L</strong>
                        </div>
                        <div class="summary-row">
                            <span>Dispensed:</span>
                            <strong id="summary-dispensed" class="text-success">0.0 L</strong>
                        </div>
                        <div class="summary-row">
                            <span>Price/Liter:</span>
                            <strong id="summary-price">₹0.00</strong>
                        </div>
                        <div class="summary-row total">
                            <span>Total Amount:</span>
                            <strong id="summary-amount">₹0.00</strong>
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
                        <li>Record readings at shift change</li>
                        <li>Verify meter accuracy regularly</li>
                        <li>Note any unusual readings</li>
                        <li>Cross-check with tank levels</li>
                        <li>Report discrepancies immediately</li>
                    </ul>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary w-100 mb-2">
                        <i class="fas fa-save me-2"></i>Save Reading
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
    const openingReading = document.querySelector('input[name="opening_reading"]');
    const closingReading = document.querySelector('input[name="closing_reading"]');
    const totalDispensed = document.querySelector('input[name="total_dispensed"]');
    const pricePerLiter = document.querySelector('input[name="price_per_liter"]');
    const totalAmount = document.querySelector('input[name="total_amount"]');

    function calculateReadings() {
        const opening = parseFloat(openingReading.value) || 0;
        const closing = parseFloat(closingReading.value) || 0;
        const price = parseFloat(pricePerLiter.value) || 0;
        
        // Calculate dispensed
        const dispensed = closing - opening;
        totalDispensed.value = dispensed > 0 ? dispensed.toFixed(1) : 0;
        
        // Calculate amount
        const amount = dispensed * price;
        totalAmount.value = amount > 0 ? amount.toFixed(2) : 0;
        
        // Update summary
        document.getElementById('summary-opening').textContent = opening.toFixed(1) + ' L';
        document.getElementById('summary-closing').textContent = closing.toFixed(1) + ' L';
        document.getElementById('summary-dispensed').textContent = (dispensed > 0 ? dispensed.toFixed(1) : 0) + ' L';
        document.getElementById('summary-price').textContent = '₹' + price.toFixed(2);
        document.getElementById('summary-amount').textContent = '₹' + (amount > 0 ? amount.toFixed(2) : 0);
    }

    openingReading.addEventListener('input', calculateReadings);
    closingReading.addEventListener('input', calculateReadings);
    pricePerLiter.addEventListener('input', calculateReadings);
});
</script>
@endpush
@endsection
