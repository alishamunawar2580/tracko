@extends('layouts.app')
@section('title', 'Products - Tracko')

@section('content')
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1>Products</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="{{ route('master.product.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add Product
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stats-card">
                <div class="stats-icon bg-primary">
                    <i class="fas fa-box"></i>
                </div>
                <div class="stats-content">
                    <h3>24</h3>
                    <p>Total Products</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stats-card">
                <div class="stats-icon bg-success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stats-content">
                    <h3>18</h3>
                    <p>Active Products</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stats-card">
                <div class="stats-icon bg-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="stats-content">
                    <h3>3</h3>
                    <p>Low Stock</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stats-card">
                <div class="stats-icon bg-danger">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stats-content">
                    <h3>6</h3>
                    <p>Inactive Products</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Table -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">All Products</h5>
                <div class="d-flex gap-2">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" class="form-control" placeholder="Search products...">
                    </div>
                    <select class="form-select" style="width: auto;">
                        <option>All Status</option>
                        <option>Active</option>
                        <option>Inactive</option>
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
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Created</th>
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
                            <td><span class="badge-category">Fuel</span></td>
                            <td><strong>₹95.50</strong>/L</td>
                            <td>
                                <div class="stock-indicator">
                                    <div class="stock-bar">
                                        <div class="stock-fill" style="width: 75%"></div>
                                    </div>
                                    <small>7,500 L</small>
                                </div>
                            </td>
                            <td><span class="badge-status active">Active</span></td>
                            <td>Jan 15, 2024</td>
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
                            <td><span class="badge-category">Fuel</span></td>
                            <td><strong>₹89.75</strong>/L</td>
                            <td>
                                <div class="stock-indicator">
                                    <div class="stock-bar">
                                        <div class="stock-fill warning" style="width: 25%"></div>
                                    </div>
                                    <small>2,100 L</small>
                                </div>
                            </td>
                            <td><span class="badge-status active">Active</span></td>
                            <td>Jan 15, 2024</td>
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
                            <td><span class="badge-category">Lubricant</span></td>
                            <td><strong>₹450.00</strong>/L</td>
                            <td>
                                <div class="stock-indicator">
                                    <div class="stock-bar">
                                        <div class="stock-fill" style="width: 60%"></div>
                                    </div>
                                    <small>120 L</small>
                                </div>
                            </td>
                            <td><span class="badge-status active">Active</span></td>
                            <td>Jan 14, 2024</td>
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
                            <td><span class="badge-category">Fuel</span></td>
                            <td><strong>₹105.20</strong>/L</td>
                            <td>
                                <div class="stock-indicator">
                                    <div class="stock-bar">
                                        <div class="stock-fill" style="width: 45%"></div>
                                    </div>
                                    <small>3,200 L</small>
                                </div>
                            </td>
                            <td><span class="badge-status inactive">Inactive</span></td>
                            <td>Jan 12, 2024</td>
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
                <span class="text-muted">Showing 1 to 4 of 24 entries</span>
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


