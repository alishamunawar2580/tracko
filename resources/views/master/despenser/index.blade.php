@extends('layouts.app')
@section('title', 'Dispensers - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Dispensers</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Dispensers</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('master.dispenser.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add Dispenser
            </a>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-primary">
                <i class="fas fa-pump-soap"></i>
            </div>
            <div class="stats-content">
                <h3>16</h3>
                <p>Total Dispensers</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stats-content">
                <h3>14</h3>
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
                <h3>1</h3>
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
                <h3>1</h3>
                <p>Inactive</p>
            </div>
        </div>
    </div>
</div>

<!-- Dispensers Table -->
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Dispensers</h5>
            <div class="d-flex gap-2">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="Search dispensers...">
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
                        <th>Dispenser</th>
                        <th>Tank</th>
                        <th>Nozzles</th>
                        <th>Model</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Last Service</th>
                        <th width="120" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>1</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="product-icon">
                                    <i class="fas fa-pump-soap"></i>
                                </div>
                                <div>
                                    <strong>Dispenser D1</strong>
                                    <small class="text-muted d-block">Code: DSP-001</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge-category">Tank A1</span></td>
                        <td><span class="badge-nozzle">4 Nozzles</span></td>
                        <td>Gilbarco Encore 500</td>
                        <td>Zone A - Bay 1</td>
                        <td><span class="badge-status active">Active</span></td>
                        <td>Jan 10, 2024</td>
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
                                    <i class="fas fa-pump-soap"></i>
                                </div>
                                <div>
                                    <strong>Dispenser D2</strong>
                                    <small class="text-muted d-block">Code: DSP-002</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge-category">Tank A2</span></td>
                        <td><span class="badge-nozzle">4 Nozzles</span></td>
                        <td>Wayne Ovation</td>
                        <td>Zone A - Bay 2</td>
                        <td><span class="badge-status active">Active</span></td>
                        <td>Jan 08, 2024</td>
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
                                    <i class="fas fa-pump-soap"></i>
                                </div>
                                <div>
                                    <strong>Dispenser D3</strong>
                                    <small class="text-muted d-block">Code: DSP-003</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge-category">Tank B1</span></td>
                        <td><span class="badge-nozzle">2 Nozzles</span></td>
                        <td>Tokheim Quantium</td>
                        <td>Zone B - Bay 1</td>
                        <td><span class="badge-status scheduled">Maintenance</span></td>
                        <td>Dec 28, 2023</td>
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
                                    <i class="fas fa-pump-soap"></i>
                                </div>
                                <div>
                                    <strong>Dispenser D4</strong>
                                    <small class="text-muted d-block">Code: DSP-004</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge-category">Tank C1</span></td>
                        <td><span class="badge-nozzle">4 Nozzles</span></td>
                        <td>Gilbarco Encore 700</td>
                        <td>Zone C - Bay 1</td>
                        <td><span class="badge-status inactive">Inactive</span></td>
                        <td>Nov 15, 2023</td>
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
            <span class="text-muted">Showing 1 to 4 of 16 entries</span>
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
