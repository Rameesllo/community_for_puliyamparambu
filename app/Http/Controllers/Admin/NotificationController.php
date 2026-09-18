<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NotificationController extends Controller
{
    public function index(): View
    {
        $notifications = AdminNotification::with('member')
            ->orderByDesc('created_at')
            ->paginate(20);

        $unreadCount = AdminNotification::unread()->count();

        return view('admin.notifications.index', compact('notifications', 'unreadCount'));
    }

    public function create(): View
    {
        $members = Member::active()->orderBy('name')->get();

        return view('admin.notifications.form', compact('members'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'type' => 'required|in:info,success,warning,alert',
            'member_id' => 'nullable|exists:members,id',
        ]);

        AdminNotification::create($validated);

        return redirect()->route('admin.notifications.index')
            ->with('status', 'Notification created successfully!');
    }

    public function markAsRead(AdminNotification $notification): RedirectResponse
    {
        $notification->update(['is_read' => true]);

        return back()->with('status', 'Notification marked as read.');
    }

    public function markAllRead(): RedirectResponse
    {
        AdminNotification::unread()->update(['is_read' => true]);

        return back()->with('status', 'All notifications marked as read.');
    }

    public function destroy(AdminNotification $notification): RedirectResponse
    {
        $notification->delete();

        return redirect()->route('admin.notifications.index')
            ->with('status', 'Notification deleted.');
    }
}
