@extends('layouts.app')
@section('title', 'Suppliers - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Suppliers</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Suppliers</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('suppliers.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Supplier
        </a>
    </div>
</div>

@include('components.alerts')

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-primary">
                <i class="fas fa-industry"></i>
            </div>
            <div class="stats-content">
                <h3>{{ $totalSuppliers }}</h3>
                <p>Total Suppliers</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stats-content">
                <h3>{{ $activeSuppliers }}</h3>
                <p>Active Suppliers</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-warning">
                <i class="fas fa-file-invoice-dollar"></i>
            </div>
            <div class="stats-content">
                <h3>{{ number_format($totalPayable, 0) }}</h3>
                <p>Total Payable (PKR)</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-danger">
                <i class="fas fa-times-circle"></i>
            </div>
            <div class="stats-content">
                <h3>{{ $totalSuppliers - $activeSuppliers }}</h3>
                <p>Inactive Suppliers</p>
            </div>
        </div>
    </div>
</div>

<!-- Suppliers Table -->
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Suppliers</h5>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" class="form-control" placeholder="Search suppliers...">
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="60">#</th>
                        <th>Supplier Name</th>
                        <th>Contact Person</th>
                        <th>Phone</th>
                        <th>NTN</th>
                        <th>Balance (PKR)</th>
                        <th>Status</th>
                        <th width="120" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($suppliers as $supplier)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td>
                            <strong>{{ $supplier->name }}</strong>
                            @if($supplier->company_name)
                            <small class="text-muted d-block">{{ $supplier->company_name }}</small>
                            @endif
                        </td>
                        <td>{{ $supplier->contact_person ?? '-' }}</td>
                        <td>{{ $supplier->phone ?? '-' }}</td>
                        <td>{{ $supplier->ntn ?? '-' }}</td>
                        <td>
                            @if($supplier->current_balance > 0)
                            <span class="text-danger">{{ number_format($supplier->current_balance, 2) }}</span>
                            @else
                            <span class="text-muted">0.00</span>
                            @endif
                        </td>
                        <td><span class="badge-status {{ $supplier->status === 'active' ? 'active' : '' }}">{{ ucfirst($supplier->status) }}</span></td>
                        <td>
                            <div class="action-buttons justify-content-center">
                                <a href="{{ route('suppliers.edit', $supplier) }}" class="btn-action" title="Edit"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" style="display:inline"
                                    onsubmit="return confirm('Delete this supplier?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-action" title="Delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">
                            <i class="fas fa-industry fa-2x mb-2 d-block"></i>
                            No suppliers found. <a href="{{ route('suppliers.create') }}">Add first supplier</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($suppliers->hasPages())
    <div class="card-footer">{{ $suppliers->links() }}</div>
    @endif
</div>
@endsection
