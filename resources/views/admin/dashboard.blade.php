<x-layouts.admin :pageTitle="'Dashboard'">
    <x-slot:title>Dashboard</x-slot:title>

    {{-- ================================================================
         DASHBOARD PAGE — Puliyamparambu Youth Community Admin
         Phase 2: UI-only with mock data.
         TODO (Phase 3+): Replace mock data with real Eloquent queries.
    ================================================================ --}}

    {{-- ── Welcome Section ─────────────────────────────────────────── --}}
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Welcome back, Admin 👋</h2>
            <p class="text-slate-500 text-sm mt-1">
                Manage the Puliyamparambu Youth Community from one place.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <span class="text-xs text-slate-400">
                {{ now()->format('l, d F Y') }}
            </span>
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
            <span class="text-xs text-emerald-500 font-medium">Live</span>
        </div>
    </div>

    {{-- ── Statistics Cards ─────────────────────────────────────────── --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
        <x-admin.stat-card
            label="Total Members"
            value="{{ $stats['total_members'] }}"
            color="orange"
            trend="Mock"
            :trendUp="true"
            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>'
        />
        <x-admin.stat-card
            label="Upcoming Events"
            value="{{ $stats['upcoming_events'] }}"
            color="blue"
            trend="Live"
            :trendUp="true"
            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>'
        />
        <x-admin.stat-card
            label="Active Team Members"
            value="{{ $stats['active_team'] }}"
            color="green"
            trend="Live"
            :trendUp="true"
            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>'
        />
        <x-admin.stat-card
            label="Published Announcements"
            value="{{ $stats['published_announcements'] }}"
            color="purple"
            trend="Live"
            :trendUp="true"
            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>'
        />
    </div>

    {{-- ── Middle Row: Events + Activity ───────────────────────────── --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-6">

        {{-- Upcoming Events Table --}}
        <div class="xl:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
                <h3 class="font-semibold text-slate-800">Upcoming Events</h3>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.events.index') }}" class="text-xs text-orange-500 hover:text-orange-600 font-medium transition-colors">
                        View All Events →
                    </a>
                    <a href="{{ route('admin.events.create') }}" class="flex items-center gap-1.5 text-xs bg-orange-500 hover:bg-orange-600 text-white font-medium px-3 py-1.5 rounded-lg transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Create Event
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-slate-50 text-left">
                            <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Event</th>
                            <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider hidden sm:table-cell">Date &amp; Time</th>
                            <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @php
                        $statusClasses = [
                            'Confirmed' => 'bg-emerald-100 text-emerald-700',
                            'Open'      => 'bg-blue-100 text-blue-700',
                            'Draft'     => 'bg-amber-100 text-amber-700',
                            'Cancelled' => 'bg-red-100 text-red-600',
                        ];
                        @endphp

                        @forelse ($upcomingEvents as $event)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-5 py-3.5">
                                <div class="font-medium text-slate-800 leading-tight">{{ $event->title }}</div>
                                <div class="text-xs text-slate-400 mt-0.5">{{ $event->location }}</div>
                            </td>
                            <td class="px-5 py-3.5 hidden sm:table-cell">
                                <div class="text-slate-700 leading-tight">{{ $event->date->format('M d, Y') }}</div>
                                <div class="text-xs text-slate-400 mt-0.5">{{ \Carbon\Carbon::parse($event->time)->format('g:i A') }}</div>
                            </td>
                            <td class="px-5 py-3.5">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClasses[$event->status] ?? 'bg-slate-100 text-slate-600' }}">
                                    {{ $event->status }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-5 py-8 text-center text-slate-500">
                                No upcoming events found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Recent Activity Feed --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-100">
                <h3 class="font-semibold text-slate-800">Recent Activity</h3>
            </div>
            <div class="divide-y divide-slate-100 overflow-y-auto max-h-96">
                @forelse ($activities as $activity)
                <div class="flex items-start gap-3 px-5 py-3.5 hover:bg-slate-50 transition-colors">
                    <div class="w-8 h-8 {{ $activity['bg'] }} rounded-full flex items-center justify-center text-sm flex-shrink-0">
                        {{ $activity['icon'] }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-slate-700 font-medium leading-tight">{{ $activity['action'] }}</p>
                        <p class="text-xs text-slate-400 mt-0.5">{{ $activity['person'] }}</p>
                    </div>
                    <p class="text-xs text-slate-400 flex-shrink-0 text-right leading-tight">{{ $activity['time'] }}</p>
                </div>
                @empty
                <div class="px-5 py-8 text-center text-slate-500 text-sm">
                    No recent activity to show.
                </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- ── Quick Actions ─────────────────────────────────────────────── --}}
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
        <h3 class="font-semibold text-slate-800 mb-4">Quick Actions</h3>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
            @php
            $quickActions = [
                [
                    'label' => 'Create Event',
                    'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>',
                    'color' => 'orange',
                ],
                [
                    'label' => 'Add Member',
                    'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>',
                    'color' => 'blue',
                ],
                [
                    'label' => 'Add Team Member',
                    'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>',
                    'color' => 'green',
                ],
                [
                    'label' => 'Create Announcement',
                    'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>',
                    'color' => 'purple',
                ],
            ];
            $qaColors = [
                'orange' => 'border-orange-200 hover:bg-orange-50 hover:border-orange-300 text-orange-600',
                'blue'   => 'border-blue-200 hover:bg-blue-50 hover:border-blue-300 text-blue-600',
                'green'  => 'border-emerald-200 hover:bg-emerald-50 hover:border-emerald-300 text-emerald-600',
                'purple' => 'border-violet-200 hover:bg-violet-50 hover:border-violet-300 text-violet-600',
            ];
            $qaIconColors = [
                'orange' => 'bg-orange-100 text-orange-600',
                'blue'   => 'bg-blue-100 text-blue-600',
                'green'  => 'bg-emerald-100 text-emerald-600',
                'purple' => 'bg-violet-100 text-violet-600',
            ];
            @endphp

            @foreach ($quickActions as $action)
            <button class="flex flex-col items-center gap-2.5 p-4 rounded-xl border bg-white {{ $qaColors[$action['color']] }} transition-all duration-200 hover:shadow-sm group text-center">
                <div class="w-10 h-10 {{ $qaIconColors[$action['color']] }} rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $action['icon'] !!}
                    </svg>
                </div>
                <span class="text-xs font-semibold text-slate-700 leading-tight">{{ $action['label'] }}</span>
            </button>
            @endforeach
        </div>
        <p class="text-xs text-slate-400 mt-3 text-center">
            Quick actions will be functional in Phase 3.
        </p>
    </div>

</x-layouts.admin>
