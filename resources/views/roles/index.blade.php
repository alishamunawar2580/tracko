@extends('layouts.app')
@section('title', 'Roles & Permissions - Tracko')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Roles & Permissions</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Roles</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('roles.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Role
        </a>
    </div>
</div>

@include('components.alerts')

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="60">#</th>
                        <th>Role Name</th>
                        <th>Display Name</th>
                        <th>Description</th>
                        <th>Users</th>
                        <th width="80" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td><code>{{ $role->name }}</code></td>
                        <td>{{ $role->display_name ?? '-' }}</td>
                        <td>{{ $role->description ?? '-' }}</td>
                        <td><span class="badge bg-secondary">{{ $role->users_count }}</span></td>
                        <td>
                            <div class="action-buttons justify-content-center">
                                <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display:inline"
                                    onsubmit="return confirm('Delete this role?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-action" title="Delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">
                            <i class="fas fa-shield-alt fa-2x mb-2 d-block"></i>
                            No roles defined. <a href="{{ route('roles.create') }}">Create first role</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($roles->hasPages())
    <div class="card-footer">{{ $roles->links() }}</div>
    @endif
</div>
@endsection
