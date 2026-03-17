@extends('layouts.app')
@section('title', 'Purchase Details - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Purchase Details</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('purchases.index') }}">Purchases</a></li>
                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('purchases.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Purchase Summary</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr><th>Date</th><td>{{ $purchase->purchase_date->format('d M Y') }}</td></tr>
                    <tr><th>Supplier</th><td>{{ $purchase->supplier?->name ?? 'N/A' }}</td></tr>
                    <tr><th>Invoice No</th><td>{{ $purchase->invoice_no ?? '-' }}</td></tr>
                    <tr><th>Vehicle No</th><td>{{ $purchase->vehicle_no ?? '-' }}</td></tr>
                    <tr><th>Total</th><td><strong>PKR {{ number_format($purchase->total_amount, 2) }}</strong></td></tr>
                    <tr><th>Paid</th><td class="text-success">PKR {{ number_format($purchase->paid_amount, 2) }}</td></tr>
                    <tr><th>Balance</th><td class="{{ $purchase->balance_amount > 0 ? 'text-danger' : 'text-success' }}">
                        PKR {{ number_format($purchase->balance_amount, 2) }}
                    </td></tr>
                    <tr><th>Status</th><td>
                        @php $statusColors = ['pending'=>'warning','received'=>'success','partial'=>'info']; @endphp
                        <span class="badge bg-{{ $statusColors[$purchase->status] ?? 'secondary' }} text-capitalize">{{ $purchase->status }}</span>
                    </td></tr>
                </table>
                @if($purchase->notes)
                <hr>
                <p class="text-muted mb-0"><small>{{ $purchase->notes }}</small></p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-8 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-list me-2"></i>Purchase Items</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Unit</th>
                                <th>Unit Cost</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($purchase->items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ number_format($item->quantity, 3) }}</td>
                                <td>{{ $item->unit }}</td>
                                <td>{{ number_format($item->unit_cost, 2) }}</td>
                                <td><strong>{{ number_format($item->amount, 2) }}</strong></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No items recorded</td>
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
