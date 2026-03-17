@extends('layouts.app')
@section('title', 'Account Details - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Account Details</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('accounts.index') }}">Daily Accounts</a></li>
                    <li class="breadcrumb-item active">{{ $account->account_date->format('d M Y') }}</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('accounts.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-calendar-day me-2"></i>{{ $account->account_date->format('d M Y') }} Account</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr><th width="50%">Opening Balance</th><td>PKR {{ number_format($account->opening_balance, 2) }}</td></tr>
                    <tr class="text-success"><th>Total Sales</th><td>PKR {{ number_format($account->total_sales, 2) }}</td></tr>
                    <tr class="text-success"><th>Total Receipts</th><td>PKR {{ number_format($account->total_receipts, 2) }}</td></tr>
                    <tr class="text-danger"><th>Total Purchases</th><td>PKR {{ number_format($account->total_purchases, 2) }}</td></tr>
                    <tr class="text-danger"><th>Total Expenses</th><td>PKR {{ number_format($account->total_expenses, 2) }}</td></tr>
                    <tr class="border-top"><th><strong>Closing Balance</strong></th>
                        <td><strong class="{{ $account->closing_balance < 0 ? 'text-danger' : 'text-success' }}">
                            PKR {{ number_format($account->closing_balance, 2) }}
                        </strong></td>
                    </tr>
                    <tr><th>Status</th><td>
                        <span class="badge-status {{ $account->status === 'closed' ? 'active' : '' }}">{{ ucfirst($account->status) }}</span>
                    </td></tr>
                </table>
                @if($account->notes)
                <hr>
                <p class="text-muted mb-0"><small>{{ $account->notes }}</small></p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
