{{--
    Admin Sidebar Component
    resources/views/components/admin/sidebar.blade.php

    TODO (Phase 3+): Replace href="#" placeholder links with real named routes.
    TODO (Phase 3+): Highlight active route using request()->routeIs().
--}}
<aside id="admin-sidebar"
       class="fixed inset-y-0 left-0 z-40 w-64 bg-slate-900 flex flex-col
              transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">

    {{-- Brand / Logo --}}
    <div class="flex items-center justify-between px-5 py-5 border-b border-slate-800">
        <a href="{{ route('home') }}" class="flex items-center gap-3 group" title="Back to public site">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-white font-bold text-base shadow-lg shadow-orange-500/30 group-hover:scale-105 transition-transform">
                P
            </div>
            <div>
                <div class="text-white font-bold text-sm leading-tight">Puliyamparambu</div>
                <div class="text-orange-400 text-xs leading-tight font-medium">Admin Portal</div>
            </div>
        </a>
        {{-- Mobile close --}}
        <button id="sidebar-close-btn"
                class="lg:hidden text-slate-400 hover:text-white p-1 rounded-lg hover:bg-slate-800 transition-colors"
                aria-label="Close sidebar">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 px-3 py-5 space-y-0.5 overflow-y-auto" aria-label="Admin navigation">

        @php
        $navItems = [
            [
                'label' => 'Dashboard',
                'route' => 'admin.dashboard',
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>',
            ],
            [
                'label' => 'Events',
                'route' => 'admin.events.index',
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>',
            ],
            [
                'label' => 'Team',
                'route' => 'admin.team.index',
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>',
            ],
            [
                'label' => 'Members',
                'route' => 'admin.members.index',
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>',
            ],
            [
                'label' => 'Announcements',
                'route' => 'admin.announcements.index',
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>',
            ],
            [
                'label' => 'Notifications',
                'route' => 'admin.notifications.index',
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>',
            ],
        ];
        @endphp

        @foreach ($navItems as $item)
            @php
                $href   = isset($item['route']) && $item['route'] ? route($item['route']) : ($item['href'] ?? '#');
                // Support wildcard matching for resource routes (e.g. admin.events.*)
                $routePattern = isset($item['route']) && $item['route'] ? rtrim($item['route'], '.index') . '.*' : null;
                $active = $routePattern && request()->routeIs($routePattern);
            @endphp
            <a href="{{ $href }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 group
                      {{ $active
                         ? 'bg-orange-500/20 text-orange-400 border border-orange-500/30'
                         : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                <svg class="w-5 h-5 flex-shrink-0 {{ $active ? 'text-orange-400' : 'text-slate-500 group-hover:text-slate-300' }}"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    {!! $item['icon'] !!}
                </svg>
                <span>{{ $item['label'] }}</span>
                @if ($active)
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-orange-400"></span>
                @endif
            </a>
        @endforeach

        {{-- Admin Accounts (ADMIN role only) --}}
        @if(auth('admin')->user()?->isAdmin())
            @php
                $accountsActive = request()->routeIs('admin.accounts.*');
            @endphp
            <a href="{{ route('admin.accounts.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 group
                      {{ $accountsActive ? 'bg-orange-500/20 text-orange-400 border border-orange-500/30' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                <svg class="w-5 h-5 flex-shrink-0 {{ $accountsActive ? 'text-orange-400' : 'text-slate-500 group-hover:text-slate-300' }}"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                <span>Admin Accounts</span>
                @if($accountsActive)
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-orange-400"></span>
                @endif
            </a>
        @endif

        {{-- Divider --}}
        <div class="pt-4 mt-4 border-t border-slate-800">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit"
                   class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-400 hover:text-red-400 hover:bg-red-500/10 transition-all duration-200 group text-left">
                    <svg class="w-5 h-5 flex-shrink-0 text-slate-500 group-hover:text-red-400"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </nav>

    {{-- Sidebar footer: show logged-in admin name + role --}}
    <div class="px-5 py-4 border-t border-slate-800">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                {{ strtoupper(substr(auth('admin')->user()?->name ?? 'AD', 0, 2)) }}
            </div>
            <div class="min-w-0">
                <div class="text-white text-xs font-semibold truncate">{{ auth('admin')->user()?->name ?? 'Admin' }}</div>
                <div class="flex items-center gap-1.5 mt-0.5">
                    <span class="text-xs font-medium px-1.5 py-0.5 rounded {{ auth('admin')->user()?->isAdmin() ? 'bg-orange-500/20 text-orange-400' : 'bg-blue-500/20 text-blue-400' }}">
                        {{ auth('admin')->user()?->role ?? 'ADMIN' }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</aside>
