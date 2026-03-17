<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public string $view = 'users.';

    public function index()
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $users = User::whereHas('organizations', fn($q) => $q->where('organizations.id', $orgId))
                ->orderBy('name')
                ->paginate(20);
            $totalUsers = $users->total();
            $adminUsers = User::where('is_admin', true)->whereHas('organizations', fn($q) => $q->where('organizations.id', $orgId))->count();
            $roles = Role::where(fn($q) => $q->where('organization_id', $orgId)->orWhereNull('organization_id'))->get();
            return view($this->view . 'index', compact('users', 'totalUsers', 'adminUsers', 'roles'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'UserController@index');
        }
    }

    public function create()
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $roles = Role::where(fn($q) => $q->where('organization_id', $orgId)->orWhereNull('organization_id'))->get();
            return view($this->view . 'create', compact('roles'));
        } catch (\Exception $e) {
            return $this->handleException($e, 'UserController@create');
        }
    }

    public function store(Request $request)
    {
        try {
            $orgId = session('current_organization_id') ?? auth()->user()->currentOrganization()?->id;
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => $request->boolean('is_admin'),
            ]);

            $user->organizations()->attach($orgId);

            return redirect()->route('users.index')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            return $this->handleException($e, 'UserController@store');
        }
    }
}
