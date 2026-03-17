<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public string $view = 'customers.';

    public function index()
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $customers = Customer::where('organization_id', $orgId)->orderBy('name')->paginate(20);
            $totalCustomers = Customer::where('organization_id', $orgId)->count();
            $activeCustomers = Customer::where('organization_id', $orgId)->where('status', 'active')->count();
            $creditCustomers = Customer::where('organization_id', $orgId)->where('type', 'credit')->count();
            $agencyCustomers = Customer::where('organization_id', $orgId)->where('type', 'agency')->count();
            return view($this->view . 'index', compact('customers', 'totalCustomers', 'activeCustomers', 'creditCustomers', 'agencyCustomers'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'CustomerController@index');
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
                'type' => 'required|in:retail,agency,credit',
                'phone' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:255',
                'credit_limit' => 'nullable|numeric|min:0',
            ]);

            Customer::create(array_merge($request->only([
                'name', 'phone', 'email', 'address', 'type',
                'company_name', 'ntn', 'credit_limit', 'status',
            ]), ['organization_id' => $orgId]));

            return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
        } catch (\Exception $e) {
            return $this->handleException($e, 'CustomerController@store');
        }
    }

    public function edit(Customer $customer)
    {
        return view($this->view . 'edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|in:retail,agency,credit',
            ]);

            $customer->update($request->only([
                'name', 'phone', 'email', 'address', 'type',
                'company_name', 'ntn', 'credit_limit', 'status',
            ]));

            return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
        } catch (\Exception $e) {
            return $this->handleException($e, 'CustomerController@update');
        }
    }

    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
            return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
        } catch (\Exception $e) {
            return $this->handleException($e, 'CustomerController@destroy');
        }
    }
}
