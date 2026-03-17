@extends('layouts.app')
@section('title', 'Fuel Tanks - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Fuel Tanks</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Fuel Tanks</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('master.tank.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add Tank
            </a>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-primary">
                <i class="fas fa-oil-can"></i>
            </div>
            <div class="stats-content">
                <h3>8</h3>
                <p>Total Tanks</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stats-content">
                <h3>6</h3>
                <p>Active Tanks</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-warning">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="stats-content">
                <h3>45,000</h3>
                <p>Total Capacity (L)</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-danger">
                <i class="fas fa-tint"></i>
            </div>
            <div class="stats-content">
                <h3>32,500</h3>
                <p>Current Stock (L)</p>
            </div>
        </div>
    </div>
</div>

<!-- Tanks Table -->
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Fuel Tanks</h5>
            <div class="d-flex gap-2">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="Search tanks...">
                </div>
                <select class="form-select" style="width: auto;">
                    <option>All Status</option>
                    <option>Active</option>
                    <option>Maintenance</option>
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
                        <th>Tank Name</th>
                        <th>Fuel Type</th>
                        <th>Capacity</th>
                        <th>Current Stock</th>
                        <th>Fill Level</th>
                        <th>Status</th>
                        <th>Last Updated</th>
                        <th width="120" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>1</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="product-icon">
                                    <i class="fas fa-oil-can"></i>
                                </div>
                                <div>
                                    <strong>Tank A1</strong>
                                    <small class="text-muted d-block">Code: TK-A1</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge-category">Petrol</span></td>
                        <td><strong>10,000</strong> L</td>
                        <td><strong>7,500</strong> L</td>
                        <td>
                            <div class="stock-indicator">
                                <div class="stock-bar">
                                    <div class="stock-fill" style="width: 75%"></div>
                                </div>
                                <small>75%</small>
                            </div>
                        </td>
                        <td><span class="badge-status active">Active</span></td>
                        <td>2 hours ago</td>
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
                                    <i class="fas fa-oil-can"></i>
                                </div>
                                <div>
                                    <strong>Tank A2</strong>
                                    <small class="text-muted d-block">Code: TK-A2</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge-category">Diesel</span></td>
                        <td><strong>8,000</strong> L</td>
                        <td><strong>2,100</strong> L</td>
                        <td>
                            <div class="stock-indicator">
                                <div class="stock-bar">
                                    <div class="stock-fill warning" style="width: 26%"></div>
                                </div>
                                <small>26%</small>
                            </div>
                        </td>
                        <td><span class="badge-status active">Active</span></td>
                        <td>1 hour ago</td>
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
                                    <strong>Tank B1</strong>
                                    <small class="text-muted d-block">Code: TK-B1</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge-category">Premium</span></td>
                        <td><strong>5,000</strong> L</td>
                        <td><strong>3,200</strong> L</td>
                        <td>
                            <div class="stock-indicator">
                                <div class="stock-bar">
                                    <div class="stock-fill" style="width: 64%"></div>
                                </div>
                                <small>64%</small>
                            </div>
                        </td>
                        <td><span class="badge-status active">Active</span></td>
                        <td>3 hours ago</td>
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
                                    <i class="fas fa-oil-can"></i>
                                </div>
                                <div>
                                    <strong>Tank C1</strong>
                                    <small class="text-muted d-block">Code: TK-C1</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge-category">Diesel</span></td>
                        <td><strong>6,000</strong> L</td>
                        <td><strong>0</strong> L</td>
                        <td>
                            <div class="stock-indicator">
                                <div class="stock-bar">
                                    <div class="stock-fill" style="width: 0%"></div>
                                </div>
                                <small>0%</small>
                            </div>
                        </td>
                        <td><span class="badge-status inactive">Maintenance</span></td>
                        <td>1 day ago</td>
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
            <span class="text-muted">Showing 1 to 4 of 8 entries</span>
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
