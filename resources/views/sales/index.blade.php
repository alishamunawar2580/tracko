@extends('layouts.app')
@section('title', 'Daily Sales - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Daily Sales</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Daily Sales</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('sales.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>New Sale Entry
            </a>
        </div>
    </div>
</div>

@include('components.alerts')

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-primary">
                <i class="fas fa-receipt"></i>
            </div>
            <div class="stats-content">
                <h3>{{ $totalSales }}</h3>
                <p>Total Records</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-success">
                <i class="fas fa-calendar-day"></i>
            </div>
            <div class="stats-content">
                <h3>{{ number_format($todaySales, 0) }}</h3>
                <p>Today's Sales (PKR)</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-warning">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="stats-content">
                <h3>{{ number_format($monthSales, 0) }}</h3>
                <p>This Month (PKR)</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-danger">
                <i class="fas fa-gas-pump"></i>
            </div>
            <div class="stats-content">
                <h3>{{ $sales->where('status', 'open')->count() }}</h3>
                <p>Open Entries</p>
            </div>
        </div>
    </div>
</div>

<!-- Sales Table -->
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Sales Records</h5>
            <div class="d-flex gap-2">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="Search sales..." id="searchInput">
                </div>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="60">#</th>
                        <th>Date</th>
                        <th>Shift</th>
                        <th>Fuel Amount</th>
                        <th>Product Amount</th>
                        <th>Total Amount</th>
                        <th>Cash</th>
                        <th>Credit</th>
                        <th>Status</th>
                        <th width="120" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sales as $sale)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td>{{ $sale->sale_date->format('d M Y') }}</td>
                        <td><span class="badge bg-secondary text-capitalize">{{ str_replace('_', ' ', $sale->shift) }}</span></td>
                        <td><strong>{{ number_format($sale->total_fuel_amount, 2) }}</strong></td>
                        <td>{{ number_format($sale->total_product_amount, 2) }}</td>
                        <td><strong class="text-success">{{ number_format($sale->total_amount, 2) }}</strong></td>
                        <td>{{ number_format($sale->cash_amount, 2) }}</td>
                        <td>{{ number_format($sale->credit_amount, 2) }}</td>
                        <td>
                            @if($sale->status === 'closed')
                                <span class="badge-status active">Closed</span>
                            @else
                                <span class="badge-status" style="background: rgba(243,156,18,0.1); color: var(--tracko-fuel);">Open</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-buttons justify-content-center">
                                <a href="{{ route('sales.show', $sale) }}" class="btn-action" title="View"><i class="fas fa-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center py-4 text-muted">
                            <i class="fas fa-receipt fa-2x mb-2 d-block"></i>
                            No sales records found. <a href="{{ route('sales.create') }}">Create first entry</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($sales->hasPages())
    <div class="card-footer">
        {{ $sales->links() }}
    </div>
    @endif
</div>
@endsection
