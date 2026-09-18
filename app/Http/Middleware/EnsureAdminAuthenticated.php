<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware that protects admin-only routes.
 *
 * If the incoming request is not authenticated via the 'admin' guard,
 * the visitor is redirected to the admin login page instead of the
 * default Laravel login route.
 */
class EnsureAdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')
                ->with('status', 'Please log in to access the admin panel.');
        }

        return $next($request);
    }
}
