<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public string $view = 'roles.';

    public function index()
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $roles = Role::where(fn($q) => $q->where('organization_id', $orgId)->orWhereNull('organization_id'))
                ->withCount('users')
                ->orderBy('name')
                ->paginate(20);
            return view($this->view . 'index', compact('roles'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'RoleController@index');
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
                'display_name' => 'nullable|string|max:255',
            ]);

            Role::create([
                'name' => $request->name,
                'display_name' => $request->display_name,
                'description' => $request->description,
                'organization_id' => $orgId,
            ]);

            return redirect()->route('roles.index')->with('success', 'Role created successfully.');
        } catch (\Exception $e) {
            return $this->handleException($e, 'RoleController@store');
        }
    }

    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
        } catch (\Exception $e) {
            return $this->handleException($e, 'RoleController@destroy');
        }
    }
}
