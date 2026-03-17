@extends('layouts.app')
@section('title', 'Daily Accounts - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Daily Accounts</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Daily Accounts</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('accounts.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>New Day Account
        </a>
    </div>
</div>

@include('components.alerts')

@if($today)
<div class="alert mb-4" style="background:rgba(0,184,148,0.1);border-left:4px solid var(--tracko-secondary);color:var(--tracko-secondary);">
    <i class="fas fa-calendar-check me-2"></i>
    <strong>Today's Account:</strong> Opening: PKR {{ number_format($today->opening_balance, 2) }} |
    Sales: PKR {{ number_format($today->total_sales, 2) }} |
    Closing: PKR {{ number_format($today->closing_balance, 2) }}
    <span class="badge ms-2 {{ $today->status === 'closed' ? 'bg-success' : 'bg-warning' }}">{{ ucfirst($today->status) }}</span>
</div>
@endif

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Account Book</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="60">#</th>
                        <th>Date</th>
                        <th>Opening Balance</th>
                        <th>Sales</th>
                        <th>Purchases</th>
                        <th>Expenses</th>
                        <th>Receipts</th>
                        <th>Closing Balance</th>
                        <th>Status</th>
                        <th width="80" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($accounts as $account)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td>{{ $account->account_date->format('d M Y') }}</td>
                        <td>{{ number_format($account->opening_balance, 2) }}</td>
                        <td class="text-success">{{ number_format($account->total_sales, 2) }}</td>
                        <td class="text-danger">{{ number_format($account->total_purchases, 2) }}</td>
                        <td class="text-danger">{{ number_format($account->total_expenses, 2) }}</td>
                        <td class="text-success">{{ number_format($account->total_receipts, 2) }}</td>
                        <td><strong {{ $account->closing_balance < 0 ? 'class="text-danger"' : 'class="text-success"' }}>
                            {{ number_format($account->closing_balance, 2) }}
                        </strong></td>
                        <td>
                            <span class="badge-status {{ $account->status === 'closed' ? 'active' : '' }}">
                                {{ ucfirst($account->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons justify-content-center">
                                <a href="{{ route('accounts.show', $account) }}" class="btn-action" title="View"><i class="fas fa-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center py-4 text-muted">
                            <i class="fas fa-book fa-2x mb-2 d-block"></i>
                            No accounts yet. <a href="{{ route('accounts.create') }}">Create first day account</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($accounts->hasPages())
    <div class="card-footer">{{ $accounts->links() }}</div>
    @endif
</div>
@endsection
