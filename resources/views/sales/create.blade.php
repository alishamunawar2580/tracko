@extends('layouts.app')
@section('title', 'New Sale Entry - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>New Sale Entry</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Daily Sales</a></li>
                    <li class="breadcrumb-item active">New Entry</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

@include('components.alerts')

<form action="{{ route('sales.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-calendar-day me-2"></i>Sale Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sale Date <span class="text-danger">*</span></label>
                            <input type="date" name="sale_date" class="form-control @error('sale_date') is-invalid @enderror"
                                value="{{ old('sale_date', date('Y-m-d')) }}" required>
                            @error('sale_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Shift <span class="text-danger">*</span></label>
                            <select name="shift" class="form-select @error('shift') is-invalid @enderror" required>
                                <option value="">-- Select Shift --</option>
                                <option value="morning" {{ old('shift') == 'morning' ? 'selected' : '' }}>Morning</option>
                                <option value="afternoon" {{ old('shift') == 'afternoon' ? 'selected' : '' }}>Afternoon</option>
                                <option value="evening" {{ old('shift') == 'evening' ? 'selected' : '' }}>Evening</option>
                                <option value="night" {{ old('shift') == 'night' ? 'selected' : '' }}>Night</option>
                                <option value="full_day" {{ old('shift', 'full_day') == 'full_day' ? 'selected' : '' }}>Full Day</option>
                            </select>
                            @error('shift')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-gas-pump me-2"></i>Sales Summary</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Total Fuel Amount (PKR)</label>
                            <input type="number" name="total_fuel_amount" step="0.01" min="0"
                                class="form-control @error('total_fuel_amount') is-invalid @enderror"
                                value="{{ old('total_fuel_amount', 0) }}" id="fuelAmount">
                            @error('total_fuel_amount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Total Product Amount (PKR)</label>
                            <input type="number" name="total_product_amount" step="0.01" min="0"
                                class="form-control @error('total_product_amount') is-invalid @enderror"
                                value="{{ old('total_product_amount', 0) }}" id="productAmount">
                            @error('total_product_amount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Total Amount (PKR)</label>
                            <input type="number" name="total_amount" step="0.01" min="0"
                                class="form-control @error('total_amount') is-invalid @enderror"
                                value="{{ old('total_amount', 0) }}" id="totalAmount" readonly
                                style="background: var(--tracko-light); font-weight: 600; font-size: 1.1rem;">
                            @error('total_amount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-money-bill-wave me-2"></i>Payment Breakdown</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Cash Amount (PKR)</label>
                        <input type="number" name="cash_amount" step="0.01" min="0"
                            class="form-control" value="{{ old('cash_amount', 0) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Credit Amount (PKR)</label>
                        <input type="number" name="credit_amount" step="0.01" min="0"
                            class="form-control" value="{{ old('credit_amount', 0) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Digital Payment (PKR)</label>
                        <input type="number" name="digital_amount" step="0.01" min="0"
                            class="form-control" value="{{ old('digital_amount', 0) }}">
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-sticky-note me-2"></i>Notes</h5>
                </div>
                <div class="card-body">
                    <textarea name="notes" class="form-control" rows="4" placeholder="Any additional notes...">{{ old('notes') }}</textarea>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Save Sale Entry
                </button>
                <a href="{{ route('sales.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
    function calcTotal() {
        const fuel = parseFloat(document.getElementById('fuelAmount').value) || 0;
        const product = parseFloat(document.getElementById('productAmount').value) || 0;
        document.getElementById('totalAmount').value = (fuel + product).toFixed(2);
    }
    document.getElementById('fuelAmount').addEventListener('input', calcTotal);
    document.getElementById('productAmount').addEventListener('input', calcTotal);
</script>
@endpush
