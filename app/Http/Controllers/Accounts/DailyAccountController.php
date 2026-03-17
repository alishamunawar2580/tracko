<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Models\DailyAccount;
use Illuminate\Http\Request;

class DailyAccountController extends Controller
{
    public string $view = 'accounts.';

    public function index()
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $accounts = DailyAccount::where('organization_id', $orgId)
                ->orderBy('account_date', 'desc')
                ->paginate(20);
            $today = DailyAccount::where('organization_id', $orgId)
                ->whereDate('account_date', today())->first();
            return view($this->view . 'index', compact('accounts', 'today'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'DailyAccountController@index');
        }
    }

    public function create()
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $latestAccount = DailyAccount::where('organization_id', $orgId)
                ->orderBy('account_date', 'desc')->first();
            $openingBalance = $latestAccount ? $latestAccount->closing_balance : 0;
            return view($this->view . 'create', compact('openingBalance'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'DailyAccountController@create');
        }
    }

    public function store(Request $request)
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $request->validate([
                'account_date' => 'required|date|unique:daily_accounts,account_date',
                'opening_balance' => 'required|numeric',
            ]);

            $closing = $request->opening_balance
                + ($request->total_sales ?? 0)
                + ($request->total_receipts ?? 0)
                - ($request->total_purchases ?? 0)
                - ($request->total_expenses ?? 0);

            DailyAccount::create([
                'organization_id' => $orgId,
                'account_date' => $request->account_date,
                'opening_balance' => $request->opening_balance,
                'total_sales' => $request->total_sales ?? 0,
                'total_purchases' => $request->total_purchases ?? 0,
                'total_expenses' => $request->total_expenses ?? 0,
                'total_receipts' => $request->total_receipts ?? 0,
                'closing_balance' => $closing,
                'notes' => $request->notes,
                'status' => 'open',
                'created_by' => auth()->id(),
            ]);

            return redirect()->route('accounts.index')->with('success', 'Daily account created successfully.');
        } catch (\Exception $e) {
            return $this->handleException($e, 'DailyAccountController@store');
        }
    }

    public function show(DailyAccount $account)
    {
        return view($this->view . 'show', compact('account'));
    }
}
