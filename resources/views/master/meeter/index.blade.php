@extends('layouts.app')
@section('title', 'Meter Readings - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Meter Readings</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Meters</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('master.meter.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add Reading
            </a>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-primary">
                <i class="fas fa-tachometer-alt"></i>
            </div>
            <div class="stats-content">
                <h3>156</h3>
                <p>Total Readings</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stats-content">
                <h3>48</h3>
                <p>Today's Readings</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-warning">
                <i class="fas fa-gas-pump"></i>
            </div>
            <div class="stats-content">
                <h3>12,450</h3>
                <p>Total Dispensed (L)</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-danger">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="stats-content">
                <h3>3</h3>
                <p>Discrepancies</p>
            </div>
        </div>
    </div>
</div>

<!-- Meter Readings Table -->
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Meter Readings</h5>
            <div class="d-flex gap-2">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="Search readings...">
                </div>
                <select class="form-select" style="width: auto;">
                    <option>All Nozzles</option>
                    <option>Nozzle 1</option>
                    <option>Nozzle 2</option>
                    <option>Nozzle 3</option>
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
                        <th>Opening Reading</th>
                        <th>Closing Reading</th>
                        <th>Dispensed</th>
                        <th>Date & Time</th>
                        <th>Recorded By</th>
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
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div>
                                    <strong>Nozzle N1-A</strong>
                                    <small class="text-muted d-block">Dispenser D1</small>
                                </div>
                            </div>
                        </td>
                        <td><strong>125,450.5</strong> L</td>
                        <td><strong>125,785.2</strong> L</td>
                        <td><span class="badge-margin">334.7 L</span></td>
                        <td>Jan 15, 2024 08:00 AM</td>
                        <td>John Doe</td>
                        <td><span class="badge-status active">Verified</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-action" title="View"><i class="fas fa-eye"></i></button>
                                <button class="btn-action" title="Edit"><i class="fas fa-edit"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>2</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="product-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div>
                                    <strong>Nozzle N1-B</strong>
                                    <small class="text-muted d-block">Dispenser D1</small>
                                </div>
                            </div>
                        </td>
                        <td><strong>98,220.8</strong> L</td>
                        <td><strong>98,512.5</strong> L</td>
                        <td><span class="badge-margin">291.7 L</span></td>
                        <td>Jan 15, 2024 08:05 AM</td>
                        <td>John Doe</td>
                        <td><span class="badge-status active">Verified</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-action" title="View"><i class="fas fa-eye"></i></button>
                                <button class="btn-action" title="Edit"><i class="fas fa-edit"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>3</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="product-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div>
                                    <strong>Nozzle N2-A</strong>
                                    <small class="text-muted d-block">Dispenser D2</small>
                                </div>
                            </div>
                        </td>
                        <td><strong>156,890.2</strong> L</td>
                        <td><strong>157,245.8</strong> L</td>
                        <td><span class="badge-margin">355.6 L</span></td>
                        <td>Jan 15, 2024 08:10 AM</td>
                        <td>Jane Smith</td>
                        <td><span class="badge-status scheduled">Pending</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-action" title="View"><i class="fas fa-eye"></i></button>
                                <button class="btn-action" title="Edit"><i class="fas fa-edit"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>4</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="product-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div>
                                    <strong>Nozzle N3-A</strong>
                                    <small class="text-muted d-block">Dispenser D3</small>
                                </div>
                            </div>
                        </td>
                        <td><strong>89,450.5</strong> L</td>
                        <td><strong>89,455.2</strong> L</td>
                        <td><span class="badge-margin">4.7 L</span></td>
                        <td>Jan 15, 2024 08:15 AM</td>
                        <td>Mike Johnson</td>
                        <td><span class="badge-status expired">Discrepancy</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-action" title="View"><i class="fas fa-eye"></i></button>
                                <button class="btn-action" title="Edit"><i class="fas fa-edit"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between align-items-center">
            <span class="text-muted">Showing 1 to 4 of 156 entries</span>
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
