<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserHasOrganization
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $organization = auth()->user()->currentOrganization();
            
            if (!$organization) {
                auth()->logout();
                return redirect()->route('login')->withErrors(['error' => 'No organization assigned.']);
            }
            
            session(['current_organization_id' => $organization->id]);
        }
        
        return $next($request);
    }
}
