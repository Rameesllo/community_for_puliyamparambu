<x-layouts.app title="Team — Puliyamparambu Youth Community"
               metaDescription="Meet the founders, team members, and alumni leading and building the Puliyamparambu Youth Community.">

    <!-- Page Header -->
    <section class="hero-gradient pt-32 pb-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 left-20 w-72 h-72 bg-blue-400 rounded-full blur-3xl animate-float"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span class="inline-block mb-4 px-4 py-1.5 rounded-full bg-blue-500/20 text-blue-300 text-sm font-semibold border border-blue-500/30">
                👥 Our People
            </span>
            <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4">Meet Our Community</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">
                Discover the founders who started our journey, the active team steering our community, and the alumni who laid the foundation.
            </p>
        </div>
    </section>

    @php
        $founders = $teamMembers->where('section', 'founders');
        $team = $teamMembers->reject(fn($m) => in_array($m->section, ['founders', 'alumni']));
        $alumni = $teamMembers->where('section', 'alumni');
    @endphp

    <!-- 1. FOUNDERS SECTION -->
    <section class="py-16 bg-slate-50 border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-purple-600 font-semibold text-sm uppercase tracking-wider">Visionaries</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">Our Founders</h2>
                <p class="mt-3 text-slate-500 max-w-xl mx-auto">The pioneers who established Puliyamparambu Youth Community.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($founders as $member)
                    <div class="card-hover bg-white rounded-2xl p-7 text-center shadow-sm border border-purple-100 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-purple-500/5 rounded-bl-full pointer-events-none"></div>
                        @if($member->image && is_numeric($member->image))
                            <img src="{{ route('file.show', $member->image) }}" class="w-24 h-24 rounded-full object-cover mx-auto mb-5 shadow-lg border-2 border-purple-200">
                        @else
                            <div class="w-24 h-24 rounded-full bg-gradient-to-br from-purple-500 to-indigo-700 flex items-center justify-center text-white font-bold text-2xl mx-auto mb-5 shadow-lg">
                                {{ substr($member->name, 0, 2) }}
                            </div>
                        @endif
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-700 mb-2">Founder</span>
                        <h3 class="font-bold text-slate-900 text-xl">{{ $member->name }}</h3>
                        <p class="text-purple-600 text-sm font-semibold mt-0.5 mb-3">{{ $member->role }}</p>
                        @if($member->linkedin_url || $member->instagram_url)
                            <div class="flex items-center justify-center gap-3 mb-4">
                                @if($member->linkedin_url)
                                    <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-slate-100 text-slate-500 hover:bg-slate-200 hover:text-slate-800 flex items-center justify-center transition-all duration-200 shadow-sm" title="LinkedIn">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                                    </a>
                                @endif
                                @if($member->instagram_url)
                                    <a href="{{ $member->instagram_url }}" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-slate-100 text-slate-500 hover:bg-slate-200 hover:text-slate-800 flex items-center justify-center transition-all duration-200 shadow-sm" title="Instagram">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                    </a>
                                @endif
                            </div>
                        @endif
                        @if($member->bio)
                            <p class="text-slate-500 text-xs leading-relaxed">{{ $member->bio }}</p>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full py-8 text-center text-slate-500">
                        Founders details will be added soon.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- 2. TEAM SECTION -->
    <section class="py-16 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-blue-500 font-semibold text-sm uppercase tracking-wider">Leadership & Operations</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">Current Team</h2>
                <p class="mt-3 text-slate-500 max-w-xl mx-auto">Active committee members leading our day-to-day community initiatives.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-7">
                @forelse($team as $member)
                    <div class="card-hover bg-white rounded-2xl p-6 text-center shadow-sm border border-slate-100">
                        @if($member->image && is_numeric($member->image))
                            <img src="{{ route('file.show', $member->image) }}" class="w-20 h-20 rounded-full object-cover mx-auto mb-4 shadow-md border-2 border-blue-100">
                        @else
                            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-blue-400 to-blue-700 flex items-center justify-center text-white font-bold text-xl mx-auto mb-4 shadow-md">
                                {{ substr($member->name, 0, 2) }}
                            </div>
                        @endif
                        <h3 class="font-bold text-slate-900 text-base">{{ $member->name }}</h3>
                        <p class="text-blue-500 text-sm font-semibold mt-0.5 mb-2">{{ $member->role }}</p>
                        @if($member->linkedin_url || $member->instagram_url)
                            <div class="flex items-center justify-center gap-2.5 mb-3">
                                @if($member->linkedin_url)
                                    <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="w-7 h-7 rounded-full bg-slate-100 text-slate-500 hover:bg-slate-200 hover:text-slate-800 flex items-center justify-center transition-all duration-200 shadow-sm" title="LinkedIn">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                                    </a>
                                @endif
                                @if($member->instagram_url)
                                    <a href="{{ $member->instagram_url }}" target="_blank" rel="noopener noreferrer" class="w-7 h-7 rounded-full bg-slate-100 text-slate-500 hover:bg-slate-200 hover:text-slate-800 flex items-center justify-center transition-all duration-200 shadow-sm" title="Instagram">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                    </a>
                                @endif
                            </div>
                        @endif
                        @if($member->bio)
                            <p class="text-slate-500 text-xs leading-relaxed line-clamp-2">{{ $member->bio }}</p>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full py-8 text-center text-slate-500">
                        No team members listed yet.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- 3. ALUMNI SECTION -->
    <section class="py-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-amber-600 font-semibold text-sm uppercase tracking-wider">Legacy</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">Alumni</h2>
                <p class="mt-3 text-slate-500 max-w-xl mx-auto">Past leaders and members who contributed significantly to our community.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($alumni as $member)
                    <div class="card-hover bg-white rounded-2xl p-5 text-center shadow-sm border border-amber-100">
                        @if($member->image && is_numeric($member->image))
                            <img src="{{ route('file.show', $member->image) }}" class="w-16 h-16 rounded-full object-cover mx-auto mb-3 shadow-md border border-amber-200">
                        @else
                            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-white font-bold text-lg mx-auto mb-3 shadow-md">
                                {{ substr($member->name, 0, 2) }}
                            </div>
                        @endif
                        <h3 class="font-bold text-slate-900 text-sm">{{ $member->name }}</h3>
                        <p class="text-amber-600 text-xs font-semibold mt-0.5 mb-2">{{ $member->role }}</p>
                        @if($member->linkedin_url || $member->instagram_url)
                            <div class="flex items-center justify-center gap-2 mb-2">
                                @if($member->linkedin_url)
                                    <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-slate-600 transition-colors" title="LinkedIn">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                                    </a>
                                @endif
                                @if($member->instagram_url)
                                    <a href="{{ $member->instagram_url }}" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-slate-600 transition-colors" title="Instagram">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full py-6 text-center text-slate-500">
                        Alumni members list will be added soon.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Join the Team CTA -->
    <section class="py-16 section-alt">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="text-5xl mb-6">🙌</div>
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Want to Be Part of the Team?</h2>
            <p class="text-slate-500 text-lg max-w-xl mx-auto mb-8">
                We are always looking for enthusiastic youth to join our committee. No experience needed — just passion and dedication!
            </p>
            <a href="{{ route('about') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-2xl bg-gradient-to-r from-blue-500 to-blue-700 text-white font-bold text-base hover:from-blue-600 hover:to-blue-800 shadow-xl shadow-blue-500/30 transition-all duration-300 hover:-translate-y-1">
                Learn How to Join
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
    </section>

    <footer class="bg-slate-900 text-slate-400 py-8 text-center text-sm">
        <p>&copy; {{ date('Y') }} Puliyamparambu Youth Community · <a href="{{ route('home') }}" class="text-blue-400 hover:text-blue-300 transition-colors">Back to Home</a></p>
    </footer>

</x-layouts.app>
