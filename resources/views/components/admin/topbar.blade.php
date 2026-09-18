{{--
Admin Topbar Component
resources/views/components/admin/topbar.blade.php

Props:
$pageTitle — page heading displayed in the bar (default: 'Dashboard')
--}}
@props(['pageTitle' => 'Dashboard'])

<header class="sticky top-0 z-20 bg-white border-b border-slate-200 shadow-sm">
    <div class="flex items-center gap-4 px-4 sm:px-6 h-16">

        {{-- Mobile sidebar open button --}}
        <button id="sidebar-open-btn"
            class="lg:hidden text-slate-500 hover:text-slate-800 p-2 rounded-xl hover:bg-slate-100 transition-colors -ml-1"
            aria-label="Open navigation menu">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        {{-- Page title --}}
        <h1 class="text-slate-800 font-semibold text-base sm:text-lg truncate">
            {{ $pageTitle }}
        </h1>

        {{-- Spacer --}}
        <div class="flex-1"></div>

        {{-- Search --}}
        <div class="hidden sm:flex items-center relative">
            <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="search" placeholder="Search…"
                class="pl-9 pr-4 py-2 text-sm bg-slate-100 border border-slate-200 rounded-xl text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent w-48 lg:w-64 transition-all"
                aria-label="Search admin" />
        </div>

        {{-- Notifications --}}
        <div class="relative">
            <button id="notif-btn"
                class="relative p-2 rounded-xl text-slate-500 hover:text-slate-800 hover:bg-slate-100 transition-colors"
                aria-label="Notifications" aria-expanded="false">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                {{-- Badge --}}
                <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-orange-500 rounded-full ring-2 ring-white"></span>
            </button>

            {{-- Notifications dropdown --}}
            <div id="notif-dropdown"
                class="hidden absolute right-0 top-full mt-2 w-80 bg-white border border-slate-200 rounded-2xl shadow-xl shadow-slate-200/60 z-50">
                <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                    <span class="text-sm font-semibold text-slate-800">Notifications</span>
                    <span class="text-xs text-orange-500 font-medium">3 new</span>
                </div>
                <div class="divide-y divide-slate-100 max-h-72 overflow-y-auto">
                    @foreach ([
                            ['icon' => '👤', 'text' => 'New member registered', 'time' => '2 min ago'],
                            ['icon' => '📅', 'text' => 'Event "Student Meetup" created', 'time' => '1 hour ago'],
                            ['icon' => '📢', 'text' => 'Announcement published', 'time' => '3 hours ago'],
                        ] as $notif)
                        <div class="flex items-start gap-3 px-4 py-3 hover:bg-slate-50 transition-colors">
                            <span class="text-lg leading-none mt-0.5">{{ $notif['icon'] }}</span>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-slate-700">{{ $notif['text'] }}</p>
                                <p class="text-xs text-slate-400 mt-0.5">{{ $notif['time'] }}</p>
                            </div>
                            <span class="w-1.5 h-1.5 rounded-full bg-orange-400 flex-shrink-0 mt-1.5"></span>
                        </div>
                    @endforeach
                </div>
                <div class="px-4 py-3 border-t border-slate-100 text-center">
                    <button class="text-xs text-orange-500 hover:text-orange-600 font-medium">View all
                        notifications</button>
                </div>
            </div>
        </div>

        {{-- Profile --}}
        <div class="relative">
            <button id="profile-menu-btn"
                class="flex items-center gap-2.5 hover:bg-slate-100 rounded-xl px-2.5 py-2 transition-colors"
                aria-label="Admin profile menu" aria-expanded="false">
                <div
                    class="w-8 h-8 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                    AD
                </div>
                <div class="hidden sm:block text-left">
                    <div class="text-xs font-semibold text-slate-800 leading-tight">Admin User</div>
                    <div class="text-xs text-slate-400 leading-tight">Super Admin</div>
                </div>
                <svg class="w-4 h-4 text-slate-400 hidden sm:block" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            {{-- Profile dropdown --}}
            <div id="profile-dropdown"
                class="hidden absolute right-0 top-full mt-2 w-52 bg-white border border-slate-200 rounded-2xl shadow-xl shadow-slate-200/60 z-50 py-1">
                <div class="px-4 py-3 border-b border-slate-100">
                    <p class="text-sm font-semibold text-slate-800">Admin User</p>
                    <p class="text-xs text-slate-400">puliyamparambu.org</p>
                </div>
                <a href="#"
                    class="flex items-center gap-2 px-4 py-2.5 text-sm text-slate-600 hover:bg-slate-50 hover:text-slate-800 transition-colors">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Profile
                </a>
                <a href="#"
                    class="flex items-center gap-2 px-4 py-2.5 text-sm text-slate-600 hover:bg-slate-50 hover:text-slate-800 transition-colors">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Settings
                </a>
                <div class="border-t border-slate-100 mt-1">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-2 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 transition-colors text-left">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>