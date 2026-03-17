<?php

namespace App\Http\Controllers\Suppliers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public string $view = 'suppliers.';

    public function index()
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $suppliers = Supplier::where('organization_id', $orgId)->orderBy('name')->paginate(20);
            $totalSuppliers = Supplier::where('organization_id', $orgId)->count();
            $activeSuppliers = Supplier::where('organization_id', $orgId)->where('status', 'active')->count();
            $totalPayable = Supplier::where('organization_id', $orgId)->sum('current_balance');
            return view($this->view . 'index', compact('suppliers', 'totalSuppliers', 'activeSuppliers', 'totalPayable'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'SupplierController@index');
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
                'phone' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:255',
            ]);

            Supplier::create(array_merge($request->only([
                'name', 'contact_person', 'phone', 'email', 'address',
                'ntn', 'company_name', 'opening_balance', 'status',
            ]), [
                'organization_id' => $orgId,
                'current_balance' => $request->opening_balance ?? 0,
            ]));

            return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
        } catch (\Exception $e) {
            return $this->handleException($e, 'SupplierController@store');
        }
    }

    public function edit(Supplier $supplier)
    {
        return view($this->view . 'edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $supplier->update($request->only([
                'name', 'contact_person', 'phone', 'email', 'address',
                'ntn', 'company_name', 'status',
            ]));

            return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
        } catch (\Exception $e) {
            return $this->handleException($e, 'SupplierController@update');
        }
    }

    public function destroy(Supplier $supplier)
    {
        try {
            $supplier->delete();
            return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
        } catch (\Exception $e) {
            return $this->handleException($e, 'SupplierController@destroy');
        }
    }
}
