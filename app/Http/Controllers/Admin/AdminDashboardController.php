<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Member;
use App\Models\TeamMember;
use Carbon\Carbon;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $today = Carbon::today();

        $stats = [
            'total_members' => Member::active()->count(),
            'upcoming_events' => Event::where('date', '>=', $today)->whereIn('status', ['Open', 'Confirmed'])->count(),
            'active_team' => TeamMember::where('is_active', true)->count(),
            'published_announcements' => Announcement::published()->count(),
        ];

        $upcomingEvents = Event::where('date', '>=', $today)
            ->orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->take(5)
            ->get();

        $unreadNotifications = AdminNotification::unread()->count();

        // Recent Activity: Combine Announcements and Members for a dynamic feed
        $recentAnnouncements = Announcement::latest()->take(3)->get()->map(function ($item) {
            return [
                'icon'   => '📢',
                'bg'     => 'bg-purple-100',
                'action' => 'Announcement ' . ($item->is_published ? 'published' : 'drafted'),
                'person' => 'Admin',
                'time'   => $item->created_at->diffForHumans(),
                'date'   => $item->created_at,
            ];
        });

        $recentMembers = Member::latest()->take(3)->get()->map(function ($item) {
            return [
                'icon'   => '👤',
                'bg'     => 'bg-blue-100',
                'action' => 'New member registered',
                'person' => $item->name,
                'time'   => $item->created_at->diffForHumans(),
                'date'   => $item->created_at,
            ];
        });

        $activities = collect($recentAnnouncements)->merge($recentMembers)
            ->sortByDesc('date')
            ->take(5)
            ->values();

        return view('admin.dashboard', compact('stats', 'upcomingEvents', 'unreadNotifications', 'activities'));
    }
}
