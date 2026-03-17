@extends('layouts.app')
@section('title', 'Sales Report - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Sales Report</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('reports.index') }}">Reports</a></li>
                    <li class="breadcrumb-item active">Sales</li>
                </ol>
            </nav>
        </div>
        <button onclick="window.print()" class="btn btn-secondary">
            <i class="fas fa-print me-2"></i>Print Report
        </button>
    </div>
</div>

<!-- Date Filter -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('reports.sales') }}" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label">From Date</label>
                <input type="date" name="from" class="form-control" value="{{ $from }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">To Date</label>
                <input type="date" name="to" class="form-control" value="{{ $to }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-filter me-2"></i>Generate Report
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Summary Cards -->
<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-primary">
                <i class="fas fa-chart-bar"></i>
            </div>
            <div class="stats-content">
                <h3>{{ number_format($totalSales, 0) }}</h3>
                <p>Total Sales (PKR)</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-warning">
                <i class="fas fa-gas-pump"></i>
            </div>
            <div class="stats-content">
                <h3>{{ number_format($totalFuel, 0) }}</h3>
                <p>Fuel Sales (PKR)</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-success">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <div class="stats-content">
                <h3>{{ number_format($totalCash, 0) }}</h3>
                <p>Cash Collected (PKR)</p>
            </div>
        </div>
    </div>
</div>

<!-- Sales Table -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Sales from {{ \Carbon\Carbon::parse($from)->format('d M Y') }} to {{ \Carbon\Carbon::parse($to)->format('d M Y') }}</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Shift</th>
                        <th>Fuel (PKR)</th>
                        <th>Products (PKR)</th>
                        <th>Total (PKR)</th>
                        <th>Cash (PKR)</th>
                        <th>Credit (PKR)</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sales as $sale)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sale->sale_date->format('d M Y') }}</td>
                        <td class="text-capitalize">{{ str_replace('_',' ',$sale->shift) }}</td>
                        <td>{{ number_format($sale->total_fuel_amount, 2) }}</td>
                        <td>{{ number_format($sale->total_product_amount, 2) }}</td>
                        <td><strong>{{ number_format($sale->total_amount, 2) }}</strong></td>
                        <td>{{ number_format($sale->cash_amount, 2) }}</td>
                        <td>{{ number_format($sale->credit_amount, 2) }}</td>
                        <td><span class="badge {{ $sale->status === 'closed' ? 'bg-success' : 'bg-warning' }}">{{ ucfirst($sale->status) }}</span></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-4 text-muted">No sales data for selected period.</td>
                    </tr>
                    @endforelse
                </tbody>
                @if($sales->count() > 0)
                <tfoot>
                    <tr class="table-active fw-bold">
                        <td colspan="3">Total</td>
                        <td>{{ number_format($totalFuel, 2) }}</td>
                        <td>{{ number_format($totalProduct, 2) }}</td>
                        <td>{{ number_format($totalSales, 2) }}</td>
                        <td>{{ number_format($totalCash, 2) }}</td>
                        <td>{{ number_format($totalCredit, 2) }}</td>
                        <td></td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection
