@extends('layouts.app')
@section('title', 'Create Pricing - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Create Pricing</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('master.pricing.index') }}">Pricing</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('master.pricing.index') }}" class="btn btn-secondary">
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
            <!-- Product Selection -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-box me-2"></i>Product Selection</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Select Product <span class="text-danger">*</span></label>
                            <select class="form-select" name="product_id" required>
                                <option value="">Choose Product</option>
                                <option value="1">Petrol (Regular) - PTR-001</option>
                                <option value="2">Diesel - DSL-001</option>
                                <option value="3">Premium Petrol - PTP-001</option>
                                <option value="4">Engine Oil 5W-30 - OIL-530</option>
                            </select>
                            <small class="text-muted">Select the product for pricing</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pricing Details -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-dollar-sign me-2"></i>Pricing Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Base Price <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" name="base_price" step="0.01" placeholder="0.00" required>
                            </div>
                            <small class="text-muted">Cost price per unit</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Selling Price <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" name="selling_price" step="0.01" placeholder="0.00" required>
                            </div>
                            <small class="text-muted">Retail price per unit</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Profit Margin</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="margin" step="0.01" placeholder="0.00" readonly>
                                <span class="input-group-text">%</span>
                            </div>
                            <small class="text-muted">Auto-calculated</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Discount (%)</label>
                            <input type="number" class="form-control" name="discount" step="0.01" placeholder="0.00">
                            <small class="text-muted">Optional discount percentage</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Final Price</label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" name="final_price" step="0.01" placeholder="0.00" readonly>
                            </div>
                            <small class="text-muted">After discount</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Validity Period -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-calendar me-2"></i>Validity Period</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Valid From <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="valid_from" required>
                            <small class="text-muted">Start date of pricing</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Valid To <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="valid_to" required>
                            <small class="text-muted">End date of pricing</small>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" name="notes" rows="3" placeholder="Add any notes or comments"></textarea>
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
                        <label class="form-label">Pricing Status <span class="text-danger">*</span></label>
                        <select class="form-select" name="status" required>
                            <option value="active">Active</option>
                            <option value="scheduled">Scheduled</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="apply_tax" name="apply_tax" checked>
                        <label class="form-check-label" for="apply_tax">Apply Tax</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="auto_update" name="auto_update">
                        <label class="form-check-label" for="auto_update">Auto Update Price</label>
                    </div>
                </div>
            </div>

            <!-- Pricing Summary -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-calculator me-2"></i>Pricing Summary</h5>
                </div>
                <div class="card-body">
                    <div class="pricing-summary">
                        <div class="summary-row">
                            <span>Base Price:</span>
                            <strong id="summary-base">₹0.00</strong>
                        </div>
                        <div class="summary-row">
                            <span>Selling Price:</span>
                            <strong id="summary-selling">₹0.00</strong>
                        </div>
                        <div class="summary-row">
                            <span>Discount:</span>
                            <strong id="summary-discount">0%</strong>
                        </div>
                        <div class="summary-row total">
                            <span>Final Price:</span>
                            <strong id="summary-final">₹0.00</strong>
                        </div>
                        <div class="summary-row">
                            <span>Profit Margin:</span>
                            <strong id="summary-margin" class="text-success">0%</strong>
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
                        <li>Set competitive pricing based on market rates</li>
                        <li>Consider seasonal price adjustments</li>
                        <li>Monitor competitor pricing regularly</li>
                        <li>Use scheduled pricing for future changes</li>
                        <li>Review profit margins periodically</li>
                    </ul>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary w-100 mb-2">
                        <i class="fas fa-save me-2"></i>Create Pricing
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
    const basePrice = document.querySelector('input[name="base_price"]');
    const sellingPrice = document.querySelector('input[name="selling_price"]');
    const discount = document.querySelector('input[name="discount"]');
    const margin = document.querySelector('input[name="margin"]');
    const finalPrice = document.querySelector('input[name="final_price"]');

    function calculatePricing() {
        const base = parseFloat(basePrice.value) || 0;
        const selling = parseFloat(sellingPrice.value) || 0;
        const disc = parseFloat(discount.value) || 0;
        
        // Calculate margin
        if (base > 0 && selling > 0) {
            const marginValue = ((selling - base) / base * 100).toFixed(2);
            margin.value = marginValue;
            document.getElementById('summary-margin').textContent = marginValue + '%';
        } else {
            margin.value = '';
            document.getElementById('summary-margin').textContent = '0%';
        }
        
        // Calculate final price
        const final = selling - (selling * disc / 100);
        finalPrice.value = final.toFixed(2);
        
        // Update summary
        document.getElementById('summary-base').textContent = '₹' + base.toFixed(2);
        document.getElementById('summary-selling').textContent = '₹' + selling.toFixed(2);
        document.getElementById('summary-discount').textContent = disc + '%';
        document.getElementById('summary-final').textContent = '₹' + final.toFixed(2);
    }

    basePrice.addEventListener('input', calculatePricing);
    sellingPrice.addEventListener('input', calculatePricing);
    discount.addEventListener('input', calculatePricing);
});
</script>
@endpush
@endsection
