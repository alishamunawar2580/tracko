<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\DailySale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public string $view = 'sales.';

    public function index()
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $sales = DailySale::where('organization_id', $orgId)
                ->orderBy('sale_date', 'desc')
                ->paginate(20);
            $totalSales = DailySale::where('organization_id', $orgId)->count();
            $todaySales = DailySale::where('organization_id', $orgId)
                ->whereDate('sale_date', today())->sum('total_amount');
            $monthSales = DailySale::where('organization_id', $orgId)
                ->whereMonth('sale_date', now()->month)->sum('total_amount');
            return view($this->view . 'index', compact('sales', 'totalSales', 'todaySales', 'monthSales'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'SaleController@index');
        }
    }

    public function create()
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $customers = Customer::where('organization_id', $orgId)->where('status', 'active')->get();
            return view($this->view . 'create', compact('customers'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'SaleController@create');
        }
    }

    public function store(Request $request)
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $request->validate([
                'sale_date' => 'required|date',
                'shift' => 'required|in:morning,afternoon,evening,night,full_day',
            ]);

            DailySale::create([
                'organization_id' => $orgId,
                'sale_date' => $request->sale_date,
                'shift' => $request->shift,
                'total_fuel_amount' => $request->total_fuel_amount ?? 0,
                'total_product_amount' => $request->total_product_amount ?? 0,
                'total_amount' => $request->total_amount ?? 0,
                'cash_amount' => $request->cash_amount ?? 0,
                'credit_amount' => $request->credit_amount ?? 0,
                'digital_amount' => $request->digital_amount ?? 0,
                'notes' => $request->notes,
                'status' => 'open',
            ]);

            return redirect()->route('sales.index')->with('success', 'Daily sale record created successfully.');
        } catch (\Exception $e) {
            return $this->handleException($e, 'SaleController@store');
        }
    }

    public function show(DailySale $sale)
    {
        try {
            $sale->load('items.product', 'items.customer', 'closedBy');
            return view($this->view . 'show', compact('sale'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'SaleController@show');
        }
    }
}
