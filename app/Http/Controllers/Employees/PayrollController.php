<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public string $view = 'payroll.';

    public function index()
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $payrolls = Payroll::with('employee')
                ->where('organization_id', $orgId)
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->paginate(20);
            $currentMonthPaid = Payroll::where('organization_id', $orgId)
                ->where('month', now()->month)->where('year', now()->year)
                ->where('status', 'paid')->sum('net_salary');
            $pendingPayroll = Payroll::where('organization_id', $orgId)
                ->where('status', 'pending')->count();
            return view($this->view . 'index', compact('payrolls', 'currentMonthPaid', 'pendingPayroll'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'PayrollController@index');
        }
    }

    public function create()
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $employees = Employee::where('organization_id', $orgId)->where('status', 'active')->get();
            return view($this->view . 'create', compact('employees'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'PayrollController@create');
        }
    }

    public function store(Request $request)
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $request->validate([
                'employee_id' => 'required|exists:employees,id',
                'month' => 'required|integer|between:1,12',
                'year' => 'required|integer|min:2020',
                'basic_salary' => 'required|numeric|min:0',
            ]);

            $net = ($request->basic_salary ?? 0) + ($request->allowances ?? 0) - ($request->deductions ?? 0);
            Payroll::create([
                'organization_id' => $orgId,
                'employee_id' => $request->employee_id,
                'month' => $request->month,
                'year' => $request->year,
                'basic_salary' => $request->basic_salary,
                'allowances' => $request->allowances ?? 0,
                'deductions' => $request->deductions ?? 0,
                'net_salary' => $net,
                'paid_date' => $request->paid_date,
                'status' => $request->status ?? 'pending',
                'notes' => $request->notes,
            ]);

            return redirect()->route('payroll.index')->with('success', 'Payroll record created successfully.');
        } catch (\Exception $e) {
            return $this->handleException($e, 'PayrollController@store');
        }
    }
}
