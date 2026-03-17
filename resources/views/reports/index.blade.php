@extends('layouts.app')
@section('title', 'Reports - Tracko')

@section('content')
<div class="page-header">
    <div>
        <h1>Reports</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Reports</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-6 mb-4">
        <a href="{{ route('reports.sales') }}" class="text-decoration-none">
            <div class="card h-100 text-center p-4" style="transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform=''">
                <div class="mb-3">
                    <div class="stats-icon bg-primary mx-auto mb-3" style="width:60px;height:60px;font-size:1.5rem;">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
                <h5 class="text-dark">Sales Report</h5>
                <p class="text-muted small">Daily fuel & product sales summary with payment breakdown</p>
                <span class="btn btn-primary btn-sm mt-auto"><i class="fas fa-arrow-right me-1"></i>View Report</span>
            </div>
        </a>
    </div>

    <div class="col-lg-4 col-md-6 mb-4">
        <a href="{{ route('reports.purchases') }}" class="text-decoration-none">
            <div class="card h-100 text-center p-4" style="transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform=''">
                <div class="mb-3">
                    <div class="stats-icon bg-warning mx-auto mb-3" style="width:60px;height:60px;font-size:1.5rem;">
                        <i class="fas fa-truck"></i>
                    </div>
                </div>
                <h5 class="text-dark">Purchase Report</h5>
                <p class="text-muted small">Fuel and product purchase history with supplier breakdown</p>
                <span class="btn btn-primary btn-sm mt-auto"><i class="fas fa-arrow-right me-1"></i>View Report</span>
            </div>
        </a>
    </div>

    <div class="col-lg-4 col-md-6 mb-4">
        <a href="{{ route('reports.stock') }}" class="text-decoration-none">
            <div class="card h-100 text-center p-4" style="transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform=''">
                <div class="mb-3">
                    <div class="stats-icon bg-success mx-auto mb-3" style="width:60px;height:60px;font-size:1.5rem;">
                        <i class="fas fa-warehouse"></i>
                    </div>
                </div>
                <h5 class="text-dark">Stock Report</h5>
                <p class="text-muted small">Current stock levels for fuel tanks and products</p>
                <span class="btn btn-primary btn-sm mt-auto"><i class="fas fa-arrow-right me-1"></i>View Report</span>
            </div>
        </a>
    </div>
</div>
@endsection
