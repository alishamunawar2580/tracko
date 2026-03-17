@extends('layouts.app')
@section('title', 'Process Payroll - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Process Payroll</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('payroll.index') }}">Payroll</a></li>
                    <li class="breadcrumb-item active">Process</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

@include('components.alerts')

<form action="{{ route('payroll.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-money-check-alt me-2"></i>Payroll Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Employee <span class="text-danger">*</span></label>
                            <select name="employee_id" class="form-select @error('employee_id') is-invalid @enderror"
                                id="employeeSelect" required>
                                <option value="">-- Select Employee --</option>
                                @foreach($employees as $emp)
                                <option value="{{ $emp->id }}"
                                    data-salary="{{ $emp->basic_salary }}"
                                    {{ old('employee_id') == $emp->id ? 'selected' : '' }}>
                                    {{ $emp->name }} ({{ $emp->designation ?? 'N/A' }})
                                </option>
                                @endforeach
                            </select>
                            @error('employee_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Month <span class="text-danger">*</span></label>
                            <select name="month" class="form-select @error('month') is-invalid @enderror" required>
                                @foreach(range(1, 12) as $m)
                                <option value="{{ $m }}" {{ old('month', now()->month) == $m ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::create(null, $m)->format('F') }}
                                </option>
                                @endforeach
                            </select>
                            @error('month')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Year <span class="text-danger">*</span></label>
                            <input type="number" name="year" min="2020" max="2099"
                                class="form-control @error('year') is-invalid @enderror"
                                value="{{ old('year', now()->year) }}" required>
                            @error('year')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Basic Salary (PKR) <span class="text-danger">*</span></label>
                            <input type="number" name="basic_salary" step="0.01" min="0"
                                class="form-control @error('basic_salary') is-invalid @enderror"
                                value="{{ old('basic_salary', 0) }}" id="basicSalary" required>
                            @error('basic_salary')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Allowances (PKR)</label>
                            <input type="number" name="allowances" step="0.01" min="0"
                                class="form-control" value="{{ old('allowances', 0) }}" id="allowances">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Deductions (PKR)</label>
                            <input type="number" name="deductions" step="0.01" min="0"
                                class="form-control" value="{{ old('deductions', 0) }}" id="deductions">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label class="form-label">Net Salary (PKR)</label>
                            <input type="text" id="netSalary" class="form-control" readonly
                                style="background: var(--tracko-light); font-weight: 700; font-size: 1.1rem; color: var(--tracko-secondary);">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Paid Date</label>
                            <input type="date" name="paid_date" class="form-control" value="{{ old('paid_date') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="pending" {{ old('status', 'pending') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ old('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="partial" {{ old('status') == 'partial' ? 'selected' : '' }}>Partial</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Notes</label>
                            <textarea name="notes" class="form-control" rows="2">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save me-2"></i>Save Payroll
                </button>
                <a href="{{ route('payroll.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
function calcNet() {
    const basic = parseFloat(document.getElementById('basicSalary').value) || 0;
    const allow = parseFloat(document.getElementById('allowances').value) || 0;
    const deduct = parseFloat(document.getElementById('deductions').value) || 0;
    document.getElementById('netSalary').value = 'PKR ' + (basic + allow - deduct).toFixed(2);
}
['basicSalary','allowances','deductions'].forEach(id => {
    document.getElementById(id).addEventListener('input', calcNet);
});
document.getElementById('employeeSelect').addEventListener('change', function() {
    const salary = this.options[this.selectedIndex].dataset.salary || 0;
    document.getElementById('basicSalary').value = salary;
    calcNet();
});
calcNet();
</script>
@endpush
