@extends('layouts.app')
@section('title', 'Stock Report - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Stock Report</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('reports.index') }}">Reports</a></li>
                    <li class="breadcrumb-item active">Stock</li>
                </ol>
            </nav>
        </div>
        <button onclick="window.print()" class="btn btn-secondary">
            <i class="fas fa-print me-2"></i>Print Report
        </button>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="alert mb-4" style="background:rgba(116,185,255,0.15);border-left:4px solid #74b9ff;color:#2d3436;">
            <i class="fas fa-info-circle me-2"></i>
            Stock levels are tracked through daily purchase records minus daily sales. Configure products and tanks in <a href="{{ route('master.product.index') }}">Master Setup</a>.
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-gas-pump me-2"></i>Fuel Tanks</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tank Name</th>
                                <th>Fuel Type</th>
                                <th>Capacity (Ltrs)</th>
                                <th>Current Stock (Ltrs)</th>
                                <th>Fill %</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    <i class="fas fa-oil-can fa-2x mb-2 d-block"></i>
                                    Add tanks from <a href="{{ route('master.tank.index') }}">Master Setup → Tanks</a> to see stock levels here.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-box me-2"></i>Other Products</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Unit</th>
                                <th>Opening Stock</th>
                                <th>Purchases</th>
                                <th>Sales</th>
                                <th>Current Stock</th>
                                <th>Reorder Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">
                                    <i class="fas fa-box fa-2x mb-2 d-block"></i>
                                    Add products from <a href="{{ route('master.product.index') }}">Master Setup → Products</a> to track stock here.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
