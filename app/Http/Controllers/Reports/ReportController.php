<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\DailySale;
use App\Models\Purchase;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public string $view = 'reports.';

    public function index()
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            return view($this->view . 'index');
        } catch (\Exception $e) {
            return $this->handleException($e, 'ReportController@index');
        }
    }

    public function salesReport(Request $request)
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $from = $request->from ?? now()->startOfMonth()->toDateString();
            $to = $request->to ?? now()->toDateString();

            $sales = DailySale::where('organization_id', $orgId)
                ->whereBetween('sale_date', [$from, $to])
                ->orderBy('sale_date')
                ->get();

            $totalSales = $sales->sum('total_amount');
            $totalFuel = $sales->sum('total_fuel_amount');
            $totalProduct = $sales->sum('total_product_amount');
            $totalCash = $sales->sum('cash_amount');
            $totalCredit = $sales->sum('credit_amount');

            return view($this->view . 'sales', compact('sales', 'totalSales', 'totalFuel', 'totalProduct', 'totalCash', 'totalCredit', 'from', 'to'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'ReportController@salesReport');
        }
    }

    public function purchasesReport(Request $request)
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $from = $request->from ?? now()->startOfMonth()->toDateString();
            $to = $request->to ?? now()->toDateString();

            $purchases = Purchase::with('supplier')
                ->where('organization_id', $orgId)
                ->whereBetween('purchase_date', [$from, $to])
                ->orderBy('purchase_date')
                ->get();

            $totalPurchases = $purchases->sum('total_amount');
            $totalPaid = $purchases->sum('paid_amount');
            $totalBalance = $purchases->sum('balance_amount');

            return view($this->view . 'purchases', compact('purchases', 'totalPurchases', 'totalPaid', 'totalBalance', 'from', 'to'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'ReportController@purchasesReport');
        }
    }

    public function stockReport()
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            return view($this->view . 'stock');
        } catch (\Exception $e) {
            return $this->handleException($e, 'ReportController@stockReport');
        }
    }
}
