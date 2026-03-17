@extends('layouts.app')
@section('title', 'Employees - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Employees</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Employees</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Employee
        </a>
    </div>
</div>

@include('components.alerts')

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-primary">
                <i class="fas fa-id-badge"></i>
            </div>
            <div class="stats-content">
                <h3>{{ $totalEmployees }}</h3>
                <p>Total Employees</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stats-content">
                <h3>{{ $activeEmployees }}</h3>
                <p>Active Employees</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-warning">
                <i class="fas fa-money-check-alt"></i>
            </div>
            <div class="stats-content">
                <h3>{{ number_format($totalPayroll, 0) }}</h3>
                <p>Monthly Payroll (PKR)</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="stats-icon bg-danger">
                <i class="fas fa-user-times"></i>
            </div>
            <div class="stats-content">
                <h3>{{ $totalEmployees - $activeEmployees }}</h3>
                <p>Inactive</p>
            </div>
        </div>
    </div>
</div>

<!-- Employees Table -->
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Employees</h5>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" class="form-control" placeholder="Search employees...">
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
                        <th>Employee Code</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Phone</th>
                        <th>Salary (PKR)</th>
                        <th>Join Date</th>
                        <th>Status</th>
                        <th width="120" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td>
                            <strong>{{ $employee->name }}</strong>
                            @if($employee->email)
                            <small class="text-muted d-block">{{ $employee->email }}</small>
                            @endif
                        </td>
                        <td>{{ $employee->employee_code ?? '-' }}</td>
                        <td>{{ $employee->designation ?? '-' }}</td>
                        <td>{{ $employee->department ?? '-' }}</td>
                        <td>{{ $employee->phone ?? '-' }}</td>
                        <td><strong>{{ number_format($employee->basic_salary, 2) }}</strong></td>
                        <td>{{ $employee->join_date ? $employee->join_date->format('d M Y') : '-' }}</td>
                        <td><span class="badge-status {{ $employee->status === 'active' ? 'active' : '' }}">{{ ucfirst($employee->status) }}</span></td>
                        <td>
                            <div class="action-buttons justify-content-center">
                                <a href="{{ route('employees.edit', $employee) }}" class="btn-action" title="Edit"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline"
                                    onsubmit="return confirm('Delete this employee?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-action" title="Delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center py-4 text-muted">
                            <i class="fas fa-id-badge fa-2x mb-2 d-block"></i>
                            No employees found. <a href="{{ route('employees.create') }}">Add first employee</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($employees->hasPages())
    <div class="card-footer">{{ $employees->links() }}</div>
    @endif
</div>
@endsection
