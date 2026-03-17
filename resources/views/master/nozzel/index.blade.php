@extends('layouts.app')
@section('title', 'Nozzles - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Nozzles</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Nozzles</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('master.nozzle.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add Nozzle
            </a>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-primary">
                <i class="fas fa-spray-can"></i>
            </div>
            <div class="stats-content">
                <h3>48</h3>
                <p>Total Nozzles</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stats-content">
                <h3>42</h3>
                <p>Active</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-warning">
                <i class="fas fa-tools"></i>
            </div>
            <div class="stats-content">
                <h3>4</h3>
                <p>Maintenance</p>
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
                <p>Inactive</p>
            </div>
        </div>
    </div>
</div>

<!-- Nozzles Table -->
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Nozzles</h5>
            <div class="d-flex gap-2">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="Search nozzles...">
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
                        <th>Nozzle</th>
                        <th>Dispenser</th>
                        <th>Fuel Type</th>
                        <th>Position</th>
                        <th>Flow Rate</th>
                        <th>Status</th>
                        <th>Last Calibration</th>
                        <th width="120" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>1</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="product-icon">
                                    <i class="fas fa-spray-can"></i>
                                </div>
                                <div>
                                    <strong>Nozzle N1-A</strong>
                                    <small class="text-muted d-block">Code: NZL-001</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge-category">Dispenser D1</span></td>
                        <td><span class="badge-nozzle">Petrol</span></td>
                        <td>Position 1</td>
                        <td><strong>45</strong> L/min</td>
                        <td><span class="badge-status active">Active</span></td>
                        <td>Jan 05, 2024</td>
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
                                    <i class="fas fa-spray-can"></i>
                                </div>
                                <div>
                                    <strong>Nozzle N1-B</strong>
                                    <small class="text-muted d-block">Code: NZL-002</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge-category">Dispenser D1</span></td>
                        <td><span class="badge-nozzle">Petrol</span></td>
                        <td>Position 2</td>
                        <td><strong>45</strong> L/min</td>
                        <td><span class="badge-status active">Active</span></td>
                        <td>Jan 05, 2024</td>
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
                                    <i class="fas fa-spray-can"></i>
                                </div>
                                <div>
                                    <strong>Nozzle N2-A</strong>
                                    <small class="text-muted d-block">Code: NZL-003</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge-category">Dispenser D2</span></td>
                        <td><span class="badge-nozzle">Diesel</span></td>
                        <td>Position 1</td>
                        <td><strong>40</strong> L/min</td>
                        <td><span class="badge-status scheduled">Maintenance</span></td>
                        <td>Dec 20, 2023</td>
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
                                    <i class="fas fa-spray-can"></i>
                                </div>
                                <div>
                                    <strong>Nozzle N3-A</strong>
                                    <small class="text-muted d-block">Code: NZL-004</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge-category">Dispenser D3</span></td>
                        <td><span class="badge-nozzle">Premium</span></td>
                        <td>Position 1</td>
                        <td><strong>50</strong> L/min</td>
                        <td><span class="badge-status inactive">Inactive</span></td>
                        <td>Nov 10, 2023</td>
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
            <span class="text-muted">Showing 1 to 4 of 48 entries</span>
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
