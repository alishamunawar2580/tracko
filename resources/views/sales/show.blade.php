@extends('layouts.app')
@section('title', 'Sale Details - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Sale Details</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Daily Sales</a></li>
                    <li class="breadcrumb-item active">{{ $sale->sale_date->format('d M Y') }}</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('sales.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Sale Summary</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr><th style="width:40%">Date</th><td>{{ $sale->sale_date->format('d M Y') }}</td></tr>
                    <tr><th>Shift</th><td class="text-capitalize">{{ str_replace('_', ' ', $sale->shift) }}</td></tr>
                    <tr><th>Fuel Sales</th><td><strong>PKR {{ number_format($sale->total_fuel_amount, 2) }}</strong></td></tr>
                    <tr><th>Product Sales</th><td>PKR {{ number_format($sale->total_product_amount, 2) }}</td></tr>
                    <tr><th>Total</th><td><strong class="text-success">PKR {{ number_format($sale->total_amount, 2) }}</strong></td></tr>
                    <tr><th>Cash</th><td>PKR {{ number_format($sale->cash_amount, 2) }}</td></tr>
                    <tr><th>Credit</th><td>PKR {{ number_format($sale->credit_amount, 2) }}</td></tr>
                    <tr><th>Digital</th><td>PKR {{ number_format($sale->digital_amount, 2) }}</td></tr>
                    <tr><th>Status</th><td>
                        @if($sale->status === 'closed')
                            <span class="badge-status active">Closed</span>
                        @else
                            <span class="badge-status" style="background:rgba(243,156,18,0.1);color:var(--tracko-fuel);">Open</span>
                        @endif
                    </td></tr>
                </table>
                @if($sale->notes)
                <hr>
                <p class="text-muted mb-0"><small>{{ $sale->notes }}</small></p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-8 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-list me-2"></i>Sale Items</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Customer</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th>Amount</th>
                                <th>Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sale->items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->customer?->name ?? '-' }}</td>
                                <td>{{ number_format($item->quantity, 3) }}</td>
                                <td>{{ number_format($item->unit_price, 2) }}</td>
                                <td><strong>{{ number_format($item->amount, 2) }}</strong></td>
                                <td><span class="badge bg-info text-capitalize">{{ $item->payment_type }}</span></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No items recorded</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
