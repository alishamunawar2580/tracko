@extends('layouts.app')
@section('title', 'Purchases - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Purchases</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Purchases</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('purchases.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>New Purchase
        </a>
    </div>
</div>

@include('components.alerts')

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-primary">
                <i class="fas fa-truck"></i>
            </div>
            <div class="stats-content">
                <h3>{{ $totalPurchases }}</h3>
                <p>Total Purchases</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-success">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="stats-content">
                <h3>{{ number_format($monthPurchases, 0) }}</h3>
                <p>This Month (PKR)</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-warning">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stats-content">
                <h3>{{ $pendingPurchases }}</h3>
                <p>Pending Receipts</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-danger">
                <i class="fas fa-file-invoice-dollar"></i>
            </div>
            <div class="stats-content">
                <h3>{{ number_format($purchases->sum('balance_amount'), 0) }}</h3>
                <p>Unpaid (PKR)</p>
            </div>
        </div>
    </div>
</div>

<!-- Purchases Table -->
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Purchases</h5>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" class="form-control" placeholder="Search purchases...">
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
                        <th>Supplier</th>
                        <th>Invoice No</th>
                        <th>Vehicle No</th>
                        <th>Total (PKR)</th>
                        <th>Paid (PKR)</th>
                        <th>Balance (PKR)</th>
                        <th>Status</th>
                        <th width="80" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($purchases as $purchase)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td>{{ $purchase->purchase_date->format('d M Y') }}</td>
                        <td>{{ $purchase->supplier?->name ?? '-' }}</td>
                        <td>{{ $purchase->invoice_no ?? '-' }}</td>
                        <td>{{ $purchase->vehicle_no ?? '-' }}</td>
                        <td><strong>{{ number_format($purchase->total_amount, 2) }}</strong></td>
                        <td class="text-success">{{ number_format($purchase->paid_amount, 2) }}</td>
                        <td class="{{ $purchase->balance_amount > 0 ? 'text-danger' : 'text-success' }}">
                            {{ number_format($purchase->balance_amount, 2) }}
                        </td>
                        <td>
                            @php $statusColors = ['pending'=>'warning','received'=>'success','partial'=>'info']; @endphp
                            <span class="badge bg-{{ $statusColors[$purchase->status] ?? 'secondary' }} text-capitalize">
                                {{ $purchase->status }}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons justify-content-center">
                                <a href="{{ route('purchases.show', $purchase) }}" class="btn-action" title="View"><i class="fas fa-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center py-4 text-muted">
                            <i class="fas fa-truck fa-2x mb-2 d-block"></i>
                            No purchases found. <a href="{{ route('purchases.create') }}">Record first purchase</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($purchases->hasPages())
    <div class="card-footer">{{ $purchases->links() }}</div>
    @endif
</div>
@endsection
