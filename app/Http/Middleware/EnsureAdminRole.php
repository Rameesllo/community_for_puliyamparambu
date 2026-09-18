<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Restrict a route to admins with a specific role.
 *
 * Usage in routes: ->middleware('admin.role:ADMIN')
 *
 * If the authenticated admin does not have the required role,
 * they are redirected to the dashboard with an error message.
 */
class EnsureAdminRole
{
    public function handle(Request $request, Closure $next, string $role = 'ADMIN'): Response
    {
        $admin = Auth::guard('admin')->user();

        if (! $admin || $admin->role !== $role) {
            return redirect()->route('admin.dashboard')
                ->with('error', 'You do not have permission to perform this action.');
        }

        return $next($request);
    }
}
