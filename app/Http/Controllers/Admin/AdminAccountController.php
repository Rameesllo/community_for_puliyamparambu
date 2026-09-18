<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Manage admin accounts and their roles.
 * Restricted to ADMIN role only.
 */
class AdminAccountController extends Controller
{
    public function index(): View
    {
        $admins = Admin::orderBy('name')->get();

        return view('admin.accounts.index', compact('admins'));
    }

    public function editRole(Admin $admin): View
    {
        return view('admin.accounts.edit-role', compact('admin'));
    }

    public function updateRole(Request $request, Admin $admin): RedirectResponse
    {
        $validated = $request->validate([
            'role' => 'required|in:ADMIN,MANAGER',
        ]);

        // Prevent the last ADMIN from demoting themselves
        $currentAdmin = Auth::guard('admin')->user();

        if ($admin->id === $currentAdmin->id) {
            return back()->with('error', 'You cannot change your own role.');
        }

        $adminCount = Admin::where('role', 'ADMIN')->count();

        if ($admin->role === 'ADMIN' && $validated['role'] !== 'ADMIN' && $adminCount <= 1) {
            return back()->with('error', 'Cannot demote the last ADMIN account.');
        }

        $admin->update(['role' => $validated['role']]);

        return redirect()->route('admin.accounts.index')
            ->with('status', "Role for {$admin->name} updated to {$validated['role']}.");
    }
}
