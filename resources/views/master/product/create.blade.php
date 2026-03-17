@extends('layouts.app')
@section('title', 'Create Product - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Create Product</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('master.product.index') }}">Products</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('master.product.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>
</div>

<form action="{{ route('master.product.store') }}" method="POST" id="createProductForm">
    @csrf
    <div class="row">
        <!-- Main Form -->
        <div class="col-lg-8">
            <!-- Basic Information -->
            <div class="card mb-4 ">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Basic Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Product Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter product name" required>
                            <small class="text-muted">Enter a clear and descriptive product name</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">SKU <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="sku" placeholder="e.g., PTR-001" required>
                            <small class="text-muted">Unique product identifier</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category <span class="text-danger">*</span></label>
                            <select class="form-select" name="category" required>
                                <option value="">Select Category</option>
                                <option value="fuel">Fuel</option>
                                <option value="lubricant">Lubricant</option>
                                <option value="accessories">Accessories</option>
                                <option value="services">Services</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Unit of Measurement <span class="text-danger">*</span></label>
                            <select class="form-select" name="unit" required>
                                <option value="">Select Unit</option>
                                <option value="liter">Liter (L)</option>
                                <option value="kilogram">Kilogram (Kg)</option>
                                <option value="piece">Piece (Pcs)</option>
                                <option value="gallon">Gallon (Gal)</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Enter product description"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pricing & Stock -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-dollar-sign me-2"></i>Pricing & Stock</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Purchase Price <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" name="purchase_price" step="0.01" placeholder="0.00" required>
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
                            <label class="form-label">Current Stock <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="stock" placeholder="0" required>
                            <small class="text-muted">Available quantity</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Minimum Stock Alert</label>
                            <input type="number" class="form-control" name="min_stock" placeholder="0">
                            <small class="text-muted">Alert when stock falls below</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Details -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Additional Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Supplier</label>
                            <select class="form-select" name="supplier">
                                <option value="">Select Supplier</option>
                                <option value="1">Indian Oil Corporation</option>
                                <option value="2">Bharat Petroleum</option>
                                <option value="3">Hindustan Petroleum</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tax Rate (%)</label>
                            <select class="form-select" name="tax_rate">
                                <option value="">Select Tax Rate</option>
                                <option value="0">0% - Exempt</option>
                                <option value="5">5% - GST</option>
                                <option value="12">12% - GST</option>
                                <option value="18">18% - GST</option>
                                <option value="28">28% - GST</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Barcode</label>
                            <input type="text" class="form-control" name="barcode" placeholder="Enter barcode">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">HSN Code</label>
                            <input type="text" class="form-control" name="hsn_code" placeholder="Enter HSN code">
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
                        <label class="form-label">Product Status <span class="text-danger">*</span></label>
                        <select class="form-select" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="featured" name="featured">
                        <label class="form-check-label" for="featured">Featured Product</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="track_stock" name="track_stock" checked>
                        <label class="form-check-label" for="track_stock">Track Stock</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="allow_backorder" name="allow_backorder">
                        <label class="form-check-label" for="allow_backorder">Allow Backorder</label>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary w-100 mb-2" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Create Product
                    </button>
                    {{-- <button type="reset" class="btn btn-secondary w-100">
                        <i class="fas fa-redo me-2"></i>Reset Form
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@push('scripts')
<script src="{{ asset('js/product.js?v=' . config('version.version')) }}"></script>
<script src="{{ asset('validation/create-product.js?v=' . config('version.version')) }}"></script>
@endpush
