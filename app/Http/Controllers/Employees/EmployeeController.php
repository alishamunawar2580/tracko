<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Payroll;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public string $view = 'employees.';

    public function index()
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $employees = Employee::where('organization_id', $orgId)->orderBy('name')->paginate(20);
            $totalEmployees = Employee::where('organization_id', $orgId)->count();
            $activeEmployees = Employee::where('organization_id', $orgId)->where('status', 'active')->count();
            $totalPayroll = Employee::where('organization_id', $orgId)->where('status', 'active')->sum('basic_salary');
            return view($this->view . 'index', compact('employees', 'totalEmployees', 'activeEmployees', 'totalPayroll'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'EmployeeController@index');
        }
    }

    public function create()
    {
        return view($this->view . 'create');
    }

    public function store(Request $request)
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $request->validate([
                'name' => 'required|string|max:255',
                'basic_salary' => 'nullable|numeric|min:0',
                'join_date' => 'nullable|date',
            ]);

            Employee::create(array_merge($request->only([
                'name', 'employee_code', 'designation', 'department',
                'phone', 'email', 'address', 'cnic', 'basic_salary', 'join_date', 'status',
            ]), ['organization_id' => $orgId]));

            return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
        } catch (\Exception $e) {
            return $this->handleException($e, 'EmployeeController@store');
        }
    }

    public function edit(Employee $employee)
    {
        return view($this->view . 'edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $employee->update($request->only([
                'name', 'employee_code', 'designation', 'department',
                'phone', 'email', 'address', 'cnic', 'basic_salary', 'join_date', 'status',
            ]));

            return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
        } catch (\Exception $e) {
            return $this->handleException($e, 'EmployeeController@update');
        }
    }

    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
        } catch (\Exception $e) {
            return $this->handleException($e, 'EmployeeController@destroy');
        }
    }
}
