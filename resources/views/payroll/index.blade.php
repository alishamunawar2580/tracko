@extends('layouts.app')
@section('title', 'Payroll - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Payroll</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Payroll</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('payroll.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Process Payroll
        </a>
    </div>
</div>

@include('components.alerts')

<div class="row mb-4">
    <div class="col-xl-4 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-success">
                <i class="fas fa-money-check-alt"></i>
            </div>
            <div class="stats-content">
                <h3>{{ number_format($currentMonthPaid, 0) }}</h3>
                <p>This Month Paid (PKR)</p>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-warning">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stats-content">
                <h3>{{ $pendingPayroll }}</h3>
                <p>Pending Payments</p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Payroll Records</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="60">#</th>
                        <th>Employee</th>
                        <th>Month / Year</th>
                        <th>Basic (PKR)</th>
                        <th>Allowances (PKR)</th>
                        <th>Deductions (PKR)</th>
                        <th>Net Salary (PKR)</th>
                        <th>Paid Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($payrolls as $payroll)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td><strong>{{ $payroll->employee?->name }}</strong></td>
                        <td>{{ \Carbon\Carbon::create($payroll->year, $payroll->month)->format('M Y') }}</td>
                        <td>{{ number_format($payroll->basic_salary, 2) }}</td>
                        <td class="text-success">{{ number_format($payroll->allowances, 2) }}</td>
                        <td class="text-danger">{{ number_format($payroll->deductions, 2) }}</td>
                        <td><strong>{{ number_format($payroll->net_salary, 2) }}</strong></td>
                        <td>{{ $payroll->paid_date ? $payroll->paid_date->format('d M Y') : '-' }}</td>
                        <td>
                            @php $pColors = ['paid'=>'success','pending'=>'warning','partial'=>'info']; @endphp
                            <span class="badge bg-{{ $pColors[$payroll->status] ?? 'secondary' }} text-capitalize">{{ $payroll->status }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-4 text-muted">
                            <i class="fas fa-money-check-alt fa-2x mb-2 d-block"></i>
                            No payroll records. <a href="{{ route('payroll.create') }}">Process first payroll</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($payrolls->hasPages())
    <div class="card-footer">{{ $payrolls->links() }}</div>
    @endif
</div>
@endsection
