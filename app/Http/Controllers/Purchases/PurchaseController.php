<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public string $view = 'purchases.';

    public function index()
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $purchases = Purchase::with('supplier')
                ->where('organization_id', $orgId)
                ->orderBy('purchase_date', 'desc')
                ->paginate(20);
            $totalPurchases = Purchase::where('organization_id', $orgId)->count();
            $monthPurchases = Purchase::where('organization_id', $orgId)
                ->whereMonth('purchase_date', now()->month)->sum('total_amount');
            $pendingPurchases = Purchase::where('organization_id', $orgId)->where('status', 'pending')->count();
            return view($this->view . 'index', compact('purchases', 'totalPurchases', 'monthPurchases', 'pendingPurchases'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'PurchaseController@index');
        }
    }

    public function create()
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $suppliers = Supplier::where('organization_id', $orgId)->where('status', 'active')->get();
            return view($this->view . 'create', compact('suppliers'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'PurchaseController@create');
        }
    }

    public function store(Request $request)
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $request->validate([
                'purchase_date' => 'required|date',
                'supplier_id' => 'nullable|exists:suppliers,id',
                'total_amount' => 'required|numeric|min:0',
            ]);

            $paid = $request->paid_amount ?? 0;
            Purchase::create([
                'organization_id' => $orgId,
                'supplier_id' => $request->supplier_id,
                'purchase_date' => $request->purchase_date,
                'invoice_no' => $request->invoice_no,
                'vehicle_no' => $request->vehicle_no,
                'total_amount' => $request->total_amount,
                'paid_amount' => $paid,
                'balance_amount' => $request->total_amount - $paid,
                'notes' => $request->notes,
                'status' => $request->status ?? 'pending',
            ]);

            return redirect()->route('purchases.index')->with('success', 'Purchase recorded successfully.');
        } catch (\Exception $e) {
            return $this->handleException($e, 'PurchaseController@store');
        }
    }

    public function show(Purchase $purchase)
    {
        try {
            $purchase->load('supplier', 'items.product');
            return view($this->view . 'show', compact('purchase'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'PurchaseController@show');
        }
    }
}
