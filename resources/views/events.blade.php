<x-layouts.app title="Events — Puliyamparambu Youth Community"
               metaDescription="Browse all upcoming and past events by Puliyamparambu Youth Community.">

    <!-- Page Header -->
    <section class="hero-gradient pt-32 pb-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-10 right-20 w-64 h-64 bg-blue-400 rounded-full blur-3xl animate-float"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span class="inline-block mb-4 px-4 py-1.5 rounded-full bg-blue-500/20 text-blue-300 text-sm font-semibold border border-blue-500/30">
                📅 Community Events
            </span>
            <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4">Our Events</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">
                From educational workshops to cultural celebrations — there is always something exciting happening at Puliyamparambu Youth Community.
            </p>
        </div>
    </section>

    <!-- Filter Tabs (static for now) -->
    <section class="bg-white border-b border-slate-100 sticky top-16 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex gap-2 overflow-x-auto py-4 scrollbar-hide">
                @foreach(['All Events','Upcoming','Education','Cultural','Sports','Social Service'] as $tab)
                    <button class="flex-shrink-0 px-5 py-2 rounded-full text-sm font-medium border transition-colors
                                   {{ $loop->first ? 'bg-blue-600 text-white border-blue-600' : 'border-slate-200 text-slate-600 hover:border-blue-300 hover:text-blue-600' }}">
                        {{ $tab }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Upcoming Events -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-slate-900 mb-8 flex items-center gap-3">
                <span class="w-3 h-3 rounded-full bg-green-500 animate-pulse inline-block"></span>
                Upcoming Events
            </h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
                @forelse($upcomingEvents as $event)
                    <div class="card-hover bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 flex flex-col">
                        <div class="h-2 bg-gradient-to-r from-blue-500 to-blue-700"></div>
                        <div class="p-6 flex flex-col flex-1">
                            <div class="flex items-start justify-between mb-4">
                                <div class="text-4xl">📅</div>
                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-600">Event</span>
                            </div>
                            <h3 class="font-bold text-slate-900 text-lg mb-2">{{ $event->title }}</h3>
                            <p class="text-slate-500 text-sm leading-relaxed mb-5 flex-1">{{ Str::limit($event->description, 120) }}</p>
                            <div class="border-t border-slate-100 pt-4 space-y-2">
                                <div class="flex items-center gap-2 text-xs text-slate-500">
                                    <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span class="font-medium text-slate-700">{{ $event->date->format('M d, Y') }}</span>
                                    <span class="text-slate-400">·</span>
                                    <span>{{ \Carbon\Carbon::parse($event->time)->format('g:i A') }}</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-slate-500">
                                    <svg class="w-4 h-4 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <span>{{ $event->location }}</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                    <span class="text-green-600 font-semibold">{{ $event->status }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-8 text-center text-slate-500">
                        No upcoming events scheduled at the moment.
                    </div>
                @endforelse
            </div>

            <!-- Past Events -->
            <h2 class="text-2xl font-bold text-slate-900 mb-8">Past Events</h2>
            <div class="space-y-4">
                @forelse($pastEvents as $past)
                    <div class="flex items-center gap-4 p-4 rounded-xl bg-slate-50 border border-slate-100 hover:bg-slate-100 transition-colors">
                        <div class="text-2xl flex-shrink-0">✅</div>
                        <div class="flex-1 min-w-0">
                            <h4 class="font-semibold text-slate-700 text-sm">{{ $past->title }}</h4>
                            <p class="text-slate-400 text-xs mt-0.5">{{ $past->date->format('M d, Y') }} · {{ $past->location }}</p>
                        </div>
                        <span class="hidden sm:block flex-shrink-0 px-3 py-1 rounded-full text-xs bg-slate-200 text-slate-500">Completed</span>
                    </div>
                @empty
                    <div class="py-4 text-slate-500">No past events found.</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 py-8 text-center text-sm">
        <p>&copy; {{ date('Y') }} Puliyamparambu Youth Community · <a href="{{ route('home') }}" class="text-blue-400 hover:text-blue-300 transition-colors">Back to Home</a></p>
    </footer>

</x-layouts.app>
