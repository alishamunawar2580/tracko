@extends('layouts.app')
@section('title', 'Pricing - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Pricing</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Pricing</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('master.pricing.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add Pricing
            </a>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-primary">
                <i class="fas fa-tags"></i>
            </div>
            <div class="stats-content">
                <h3>12</h3>
                <p>Total Pricing Rules</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stats-content">
                <h3>8</h3>
                <p>Active Pricing</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-warning">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stats-content">
                <h3>2</h3>
                <p>Scheduled</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-danger">
                <i class="fas fa-times-circle"></i>
            </div>
            <div class="stats-content">
                <h3>2</h3>
                <p>Expired</p>
            </div>
        </div>
    </div>
</div>

<!-- Pricing Table -->
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Pricing</h5>
            <div class="d-flex gap-2">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="Search pricing...">
                </div>
                <select class="form-select" style="width: auto;">
                    <option>All Status</option>
                    <option>Active</option>
                    <option>Scheduled</option>
                    <option>Expired</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="60">#</th>
                        <th>Product</th>
                        <th>Base Price</th>
                        <th>Selling Price</th>
                        <th>Margin</th>
                        <th>Valid From</th>
                        <th>Valid To</th>
                        <th>Status</th>
                        <th width="120" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>1</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="product-icon">
                                    <i class="fas fa-gas-pump"></i>
                                </div>
                                <div>
                                    <strong>Petrol (Regular)</strong>
                                    <small class="text-muted d-block">SKU: PTR-001</small>
                                </div>
                            </div>
                        </td>
                        <td><strong>₹92.00</strong>/L</td>
                        <td><strong>₹95.50</strong>/L</td>
                        <td><span class="badge-margin">3.8%</span></td>
                        <td>Jan 01, 2024</td>
                        <td>Dec 31, 2024</td>
                        <td><span class="badge-status active">Active</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-action" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="btn-action" title="Delete"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>2</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="product-icon">
                                    <i class="fas fa-gas-pump"></i>
                                </div>
                                <div>
                                    <strong>Diesel</strong>
                                    <small class="text-muted d-block">SKU: DSL-001</small>
                                </div>
                            </div>
                        </td>
                        <td><strong>₹86.00</strong>/L</td>
                        <td><strong>₹89.75</strong>/L</td>
                        <td><span class="badge-margin">4.4%</span></td>
                        <td>Jan 01, 2024</td>
                        <td>Dec 31, 2024</td>
                        <td><span class="badge-status active">Active</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-action" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="btn-action" title="Delete"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>3</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="product-icon">
                                    <i class="fas fa-oil-can"></i>
                                </div>
                                <div>
                                    <strong>Engine Oil 5W-30</strong>
                                    <small class="text-muted d-block">SKU: OIL-530</small>
                                </div>
                            </div>
                        </td>
                        <td><strong>₹380.00</strong>/L</td>
                        <td><strong>₹450.00</strong>/L</td>
                        <td><span class="badge-margin">18.4%</span></td>
                        <td>Jan 15, 2024</td>
                        <td>Mar 31, 2024</td>
                        <td><span class="badge-status scheduled">Scheduled</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-action" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="btn-action" title="Delete"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>4</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="product-icon">
                                    <i class="fas fa-gas-pump"></i>
                                </div>
                                <div>
                                    <strong>Premium Petrol</strong>
                                    <small class="text-muted d-block">SKU: PTP-001</small>
                                </div>
                            </div>
                        </td>
                        <td><strong>₹98.00</strong>/L</td>
                        <td><strong>₹105.20</strong>/L</td>
                        <td><span class="badge-margin">7.3%</span></td>
                        <td>Dec 01, 2023</td>
                        <td>Dec 31, 2023</td>
                        <td><span class="badge-status expired">Expired</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-action" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="btn-action" title="Delete"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between align-items-center">
            <span class="text-muted">Showing 1 to 4 of 12 entries</span>
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
