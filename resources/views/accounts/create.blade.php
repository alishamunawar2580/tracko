@extends('layouts.app')
@section('title', 'New Day Account - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>New Day Account</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('accounts.index') }}">Daily Accounts</a></li>
                    <li class="breadcrumb-item active">New</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

@include('components.alerts')

<form action="{{ route('accounts.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-book me-2"></i>Account Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Account Date <span class="text-danger">*</span></label>
                            <input type="date" name="account_date" class="form-control @error('account_date') is-invalid @enderror"
                                value="{{ old('account_date', date('Y-m-d')) }}" required>
                            @error('account_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Opening Balance (PKR) <span class="text-danger">*</span></label>
                            <input type="number" name="opening_balance" step="0.01" class="form-control @error('opening_balance') is-invalid @enderror"
                                value="{{ old('opening_balance', $openingBalance) }}" id="openingBal" required>
                            @error('opening_balance')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Total Sales (PKR)</label>
                            <input type="number" name="total_sales" step="0.01" min="0" class="form-control"
                                value="{{ old('total_sales', 0) }}" id="totalSales">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Total Receipts (PKR)</label>
                            <input type="number" name="total_receipts" step="0.01" min="0" class="form-control"
                                value="{{ old('total_receipts', 0) }}" id="totalReceipts">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Total Purchases (PKR)</label>
                            <input type="number" name="total_purchases" step="0.01" min="0" class="form-control"
                                value="{{ old('total_purchases', 0) }}" id="totalPurchases">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Total Expenses (PKR)</label>
                            <input type="number" name="total_expenses" step="0.01" min="0" class="form-control"
                                value="{{ old('total_expenses', 0) }}" id="totalExpenses">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Closing Balance (PKR)</label>
                            <input type="number" name="closing_balance" step="0.01" id="closingBal"
                                class="form-control" readonly
                                style="background: var(--tracko-light); font-weight: 600; font-size: 1.1rem;">
                            <small class="text-muted">Auto-calculated: Opening + Sales + Receipts - Purchases - Expenses</small>
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
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="fas fa-calculator me-2"></i>Summary</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Opening Balance</span>
                        <strong id="summaryOpening">0.00</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2 text-success">
                        <span>+ Sales</span>
                        <strong id="summarySales">0.00</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2 text-success">
                        <span>+ Receipts</span>
                        <strong id="summaryReceipts">0.00</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2 text-danger">
                        <span>- Purchases</span>
                        <strong id="summaryPurchases">0.00</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2 text-danger">
                        <span>- Expenses</span>
                        <strong id="summaryExpenses">0.00</strong>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span><strong>Closing Balance</strong></span>
                        <strong id="summaryClosing" class="text-primary">0.00</strong>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Save Account
                </button>
                <a href="{{ route('accounts.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
function calcAccount() {
    const opening = parseFloat(document.getElementById('openingBal').value) || 0;
    const sales = parseFloat(document.getElementById('totalSales').value) || 0;
    const receipts = parseFloat(document.getElementById('totalReceipts').value) || 0;
    const purchases = parseFloat(document.getElementById('totalPurchases').value) || 0;
    const expenses = parseFloat(document.getElementById('totalExpenses').value) || 0;
    const closing = opening + sales + receipts - purchases - expenses;
    document.getElementById('closingBal').value = closing.toFixed(2);
    document.getElementById('summaryOpening').textContent = opening.toFixed(2);
    document.getElementById('summarySales').textContent = sales.toFixed(2);
    document.getElementById('summaryReceipts').textContent = receipts.toFixed(2);
    document.getElementById('summaryPurchases').textContent = purchases.toFixed(2);
    document.getElementById('summaryExpenses').textContent = expenses.toFixed(2);
    document.getElementById('summaryClosing').textContent = closing.toFixed(2);
}
['openingBal','totalSales','totalReceipts','totalPurchases','totalExpenses'].forEach(id => {
    document.getElementById(id).addEventListener('input', calcAccount);
});
calcAccount();
</script>
@endpush
