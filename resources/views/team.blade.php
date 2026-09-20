<x-layouts.app title="Team — Puliyamparambu Youth Community"
               metaDescription="Meet the dedicated team leading the Puliyamparambu Youth Community.">

    <!-- Page Header -->
    <section class="hero-gradient pt-32 pb-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 left-20 w-72 h-72 bg-blue-400 rounded-full blur-3xl animate-float"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span class="inline-block mb-4 px-4 py-1.5 rounded-full bg-blue-500/20 text-blue-300 text-sm font-semibold border border-blue-500/30">
                👥 Our People
            </span>
            <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4">Meet Our Team</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">
                Behind every successful community is a group of dedicated individuals who give their time, energy, and heart. Meet our incredible team.
            </p>
        </div>
    </section>

    <!-- Executive Committee -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="text-blue-500 font-semibold text-sm uppercase tracking-wider">Leadership</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">Executive Committee</h2>
                <p class="mt-3 text-slate-500 max-w-xl mx-auto">The core team responsible for the overall direction and management of our community.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-20">
                @forelse($teamMembers->where('role', 'President')->merge($teamMembers->where('role', '!=', 'President')->take(3)) as $member)
                    <div class="card-hover bg-white rounded-2xl p-7 text-center shadow-sm border border-slate-100">
                        @if($member->image && is_numeric($member->image))
                            <img src="{{ route('file.show', $member->image) }}" class="w-24 h-24 rounded-full object-cover mx-auto mb-5 shadow-lg">
                        @else
                            <div class="w-24 h-24 rounded-full bg-gradient-to-br from-blue-400 to-blue-700 flex items-center justify-center text-white font-bold text-2xl mx-auto mb-5 shadow-lg">
                                {{ substr($member->name, 0, 2) }}
                            </div>
                        @endif
                        <h3 class="font-bold text-slate-900 text-lg">{{ $member->name }}</h3>
                        <p class="text-blue-500 text-sm font-semibold mt-1 mb-3">{{ $member->role }}</p>
                        <p class="text-slate-500 text-xs leading-relaxed mb-4">{{ $member->bio }}</p>
                    </div>
                @empty
                    <div class="col-span-full py-8 text-center text-slate-500">
                        No executive committee members available at the moment.
                    </div>
                @endforelse
            </div>

            <!-- Other Committee Members -->
            <div class="text-center mb-10">
                <span class="text-blue-500 font-semibold text-sm uppercase tracking-wider">Extended Committee</span>
                <h2 class="mt-2 text-2xl sm:text-3xl font-bold text-slate-900">Department Heads</h2>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @forelse($teamMembers->where('role', '!=', 'President')->skip(3) as $member)
                    <div class="card-hover flex items-center gap-4 p-5 bg-white rounded-2xl shadow-sm border border-slate-100">
                        @if($member->image && is_numeric($member->image))
                            <img src="{{ route('file.show', $member->image) }}" class="w-14 h-14 rounded-full object-cover shadow-md">
                        @else
                            <div class="w-14 h-14 rounded-full bg-gradient-to-br from-cyan-400 to-cyan-600 flex items-center justify-center text-white font-bold text-base flex-shrink-0 shadow-md">
                                {{ substr($member->name, 0, 2) }}
                            </div>
                        @endif
                        <div>
                            <h3 class="font-bold text-slate-900 text-sm">{{ $member->name }}</h3>
                            <p class="text-blue-500 text-xs font-medium mt-0.5">{{ $member->role }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-4 text-center text-slate-500">
                        No additional team members found.
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
