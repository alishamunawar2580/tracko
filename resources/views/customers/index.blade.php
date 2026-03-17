@extends('layouts.app')
@section('title', 'Customers - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Customers</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Customers</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('customers.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add Customer
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
                <i class="fas fa-users"></i>
            </div>
            <div class="stats-content">
                <h3>{{ $totalCustomers }}</h3>
                <p>Total Customers</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stats-content">
                <h3>{{ $activeCustomers }}</h3>
                <p>Active Customers</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-warning">
                <i class="fas fa-credit-card"></i>
            </div>
            <div class="stats-content">
                <h3>{{ $creditCustomers }}</h3>
                <p>Credit Customers</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-danger">
                <i class="fas fa-building"></i>
            </div>
            <div class="stats-content">
                <h3>{{ $agencyCustomers }}</h3>
                <p>Agencies</p>
            </div>
        </div>
    </div>
</div>

<!-- Customers Table -->
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Customers</h5>
            <div class="d-flex gap-2">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="Search customers...">
                </div>
                <select class="form-select" style="width: auto;">
                    <option>All Types</option>
                    <option>Retail</option>
                    <option>Agency</option>
                    <option>Credit</option>
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
                        <th>Name</th>
                        <th>Type</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th>Credit Limit</th>
                        <th>Balance</th>
                        <th>Status</th>
                        <th width="120" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $customer)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td>
                            <strong>{{ $customer->name }}</strong>
                            @if($customer->email)
                            <small class="text-muted d-block">{{ $customer->email }}</small>
                            @endif
                        </td>
                        <td>
                            @php $typeColors = ['retail'=>'bg-primary','agency'=>'bg-warning','credit'=>'bg-danger']; @endphp
                            <span class="badge {{ $typeColors[$customer->type] ?? 'bg-secondary' }} text-capitalize">{{ $customer->type }}</span>
                        </td>
                        <td>{{ $customer->phone ?? '-' }}</td>
                        <td>{{ $customer->company_name ?? '-' }}</td>
                        <td>{{ $customer->credit_limit > 0 ? number_format($customer->credit_limit, 2) : '-' }}</td>
                        <td>
                            @if($customer->current_balance > 0)
                            <span class="text-danger">{{ number_format($customer->current_balance, 2) }}</span>
                            @else
                            <span class="text-success">0.00</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge-status {{ $customer->status === 'active' ? 'active' : '' }}">
                                {{ ucfirst($customer->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons justify-content-center">
                                <a href="{{ route('customers.edit', $customer) }}" class="btn-action" title="Edit"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('customers.destroy', $customer) }}" method="POST" style="display:inline"
                                    onsubmit="return confirm('Delete this customer?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-action" title="Delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-4 text-muted">
                            <i class="fas fa-users fa-2x mb-2 d-block"></i>
                            No customers found. <a href="{{ route('customers.create') }}">Add first customer</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($customers->hasPages())
    <div class="card-footer">{{ $customers->links() }}</div>
    @endif
</div>
@endsection
