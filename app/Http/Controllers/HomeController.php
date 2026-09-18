<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Event;
use App\Models\Member;
use App\Models\TeamMember;
use Carbon\Carbon;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $today = Carbon::today();

        // Upcoming events — next 3 open/confirmed events
        $upcomingEvents = Event::where('date', '>=', $today)
            ->whereIn('status', ['Open', 'Confirmed'])
            ->orderBy('date')
            ->take(3)
            ->get();

        // Team preview — top 4 active members by display order
        $teamMembers = TeamMember::where('is_active', true)
            ->orderBy('display_order')
            ->take(4)
            ->get();

        // Latest published announcements
        $latestAnnouncements = Announcement::published()->take(3)->get();

        // Community statistics
        $stats = [
            'active_members'  => Member::active()->count() ?: '200+',
            'events_per_year' => Event::whereYear('created_at', now()->year)->count() ?: '25+',
            'years_active'    => max(1, now()->year - 2020) . '+',
            'programs'        => '10+',
        ];

        return view('home', compact('upcomingEvents', 'teamMembers', 'latestAnnouncements', 'stats'));
    }
}
