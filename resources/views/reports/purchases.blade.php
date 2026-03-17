@extends('layouts.app')
@section('title', 'Purchase Report - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Purchase Report</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('reports.index') }}">Reports</a></li>
                    <li class="breadcrumb-item active">Purchases</li>
                </ol>
            </nav>
        </div>
        <button onclick="window.print()" class="btn btn-secondary">
            <i class="fas fa-print me-2"></i>Print Report
        </button>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('reports.purchases') }}" class="row g-3 align-items-end">
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

<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-primary"><i class="fas fa-truck"></i></div>
            <div class="stats-content">
                <h3>{{ number_format($totalPurchases, 0) }}</h3>
                <p>Total Purchases (PKR)</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-success"><i class="fas fa-check-circle"></i></div>
            <div class="stats-content">
                <h3>{{ number_format($totalPaid, 0) }}</h3>
                <p>Total Paid (PKR)</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-danger"><i class="fas fa-exclamation-circle"></i></div>
            <div class="stats-content">
                <h3>{{ number_format($totalBalance, 0) }}</h3>
                <p>Outstanding (PKR)</p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Purchases from {{ \Carbon\Carbon::parse($from)->format('d M Y') }} to {{ \Carbon\Carbon::parse($to)->format('d M Y') }}</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Supplier</th>
                        <th>Invoice No</th>
                        <th>Total (PKR)</th>
                        <th>Paid (PKR)</th>
                        <th>Balance (PKR)</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($purchases as $purchase)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $purchase->purchase_date->format('d M Y') }}</td>
                        <td>{{ $purchase->supplier?->name ?? '-' }}</td>
                        <td>{{ $purchase->invoice_no ?? '-' }}</td>
                        <td><strong>{{ number_format($purchase->total_amount, 2) }}</strong></td>
                        <td class="text-success">{{ number_format($purchase->paid_amount, 2) }}</td>
                        <td class="{{ $purchase->balance_amount > 0 ? 'text-danger' : '' }}">{{ number_format($purchase->balance_amount, 2) }}</td>
                        <td>
                            @php $sc = ['pending'=>'warning','received'=>'success','partial'=>'info']; @endphp
                            <span class="badge bg-{{ $sc[$purchase->status] ?? 'secondary' }}">{{ ucfirst($purchase->status) }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">No purchase data for selected period.</td>
                    </tr>
                    @endforelse
                </tbody>
                @if($purchases->count() > 0)
                <tfoot>
                    <tr class="table-active fw-bold">
                        <td colspan="4">Total</td>
                        <td>{{ number_format($totalPurchases, 2) }}</td>
                        <td>{{ number_format($totalPaid, 2) }}</td>
                        <td>{{ number_format($totalBalance, 2) }}</td>
                        <td></td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection
