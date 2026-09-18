<x-layouts.app title="Announcements — Puliyamparambu Youth Community"
               metaDescription="Read the latest news and announcements from Puliyamparambu Youth Community.">

    <!-- Page Header -->
    <section class="hero-gradient pt-32 pb-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-10 right-20 w-64 h-64 bg-orange-400 rounded-full blur-3xl animate-float"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span class="inline-block mb-4 px-4 py-1.5 rounded-full bg-orange-500/20 text-orange-300 text-sm font-semibold border border-orange-500/30">
                📢 Community Announcements
            </span>
            <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4">Announcements</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">
                Stay up to date with the latest news, notices, and updates from Puliyamparambu Youth Community.
            </p>
        </div>
    </section>

    <!-- Announcements List -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            @forelse ($announcements as $announcement)
                <article class="mb-8 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-1.5 bg-gradient-to-r from-orange-400 to-orange-600"></div>
                    <div class="p-7">
                        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3 mb-4">
                            <h2 class="text-xl font-bold text-slate-900 leading-tight">{{ $announcement->title }}</h2>
                            <div class="flex-shrink-0 flex items-center gap-1.5 text-xs text-slate-400">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ $announcement->published_at?->format('M d, Y') }}
                            </div>
                        </div>
                        <div class="prose prose-slate prose-sm max-w-none text-slate-600 leading-relaxed whitespace-pre-line">{{ $announcement->content }}</div>
                    </div>
                </article>
            @empty
                <div class="py-20 text-center">
                    <div class="text-5xl mb-4">📭</div>
                    <h3 class="text-xl font-semibold text-slate-700 mb-2">No announcements yet</h3>
                    <p class="text-slate-500">Check back soon for updates from Puliyamparambu Youth Community.</p>
                </div>
            @endforelse

            {{-- Pagination --}}
            @if ($announcements->hasPages())
                <div class="mt-10">
                    {{ $announcements->links() }}
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 py-8 text-center text-sm">
        <p>&copy; {{ date('Y') }} Puliyamparambu Youth Community · <a href="{{ route('home') }}" class="text-blue-400 hover:text-blue-300 transition-colors">Back to Home</a></p>
    </footer>

</x-layouts.app>
