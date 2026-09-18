<x-layouts.admin :pageTitle="'Notifications'">
    <x-slot:title>Notifications</x-slot:title>

    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                Notifications
                @if($unreadCount > 0)
                    <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-red-500 text-white text-xs font-bold">
                        {{ $unreadCount > 99 ? '99+' : $unreadCount }}
                    </span>
                @endif
            </h2>
            <p class="text-slate-500 text-sm mt-1">Create and manage community notifications.</p>
        </div>
        <div class="flex items-center gap-2">
            @if($unreadCount > 0)
                <form action="{{ route('admin.notifications.mark-all-read') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 border border-slate-200 text-slate-600 rounded-xl font-medium hover:bg-slate-50 transition-colors text-sm">
                        Mark All Read
                    </button>
                </form>
            @endif
            <a href="{{ route('admin.notifications.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-orange-500 text-white rounded-xl font-medium hover:bg-orange-600 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                New Notification
            </a>
        </div>
    </div>

    @if (session('status'))
        <div class="mb-4 bg-emerald-500/10 border border-emerald-400/25 rounded-xl px-4 py-3">
            <p class="text-emerald-600 text-sm font-medium">{{ session('status') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 bg-red-500/10 border border-red-400/25 rounded-xl px-4 py-3">
            <p class="text-red-600 text-sm font-medium">{{ session('error') }}</p>
        </div>
    @endif

    <div class="space-y-3">
        @forelse ($notifications as $n)
            @php $typeClasses = \App\Models\AdminNotification::typeClasses(); @endphp
            <div class="bg-white rounded-2xl border {{ $n->is_read ? 'border-slate-100' : 'border-orange-200 shadow-sm' }} p-5 flex items-start gap-4">
                {{-- Type badge --}}
                <div class="flex-shrink-0 mt-0.5">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold uppercase tracking-wide {{ $typeClasses[$n->type] ?? 'bg-slate-100 text-slate-600' }}">
                        {{ $n->type }}
                    </span>
                </div>

                {{-- Content --}}
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between gap-2">
                        <p class="font-semibold text-slate-800 text-sm {{ $n->is_read ? 'font-medium' : 'font-bold' }}">
                            {{ $n->title }}
                            @if(! $n->is_read)
                                <span class="ml-1.5 inline-block w-2 h-2 rounded-full bg-orange-500 align-middle"></span>
                            @endif
                        </p>
                        <span class="text-xs text-slate-400 flex-shrink-0">{{ $n->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-slate-600 text-sm mt-1 leading-relaxed">{{ $n->message }}</p>
                    @if($n->member)
                        <div class="mt-2 flex items-center gap-1.5 text-xs text-slate-400">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            Linked to: <span class="font-medium text-slate-600">{{ $n->member->name }}</span>
                        </div>
                    @endif
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-2 flex-shrink-0">
                    @if(! $n->is_read)
                        <form action="{{ route('admin.notifications.mark-read', $n) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-xs text-emerald-500 hover:text-emerald-600 font-medium transition-colors">Read</button>
                        </form>
                    @endif
                    <form action="{{ route('admin.notifications.destroy', $n) }}" method="POST" onsubmit="return confirm('Delete this notification?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xs text-red-400 hover:text-red-600 font-medium transition-colors">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="py-16 text-center bg-white rounded-2xl border border-slate-100">
                <div class="text-5xl mb-3">🔔</div>
                <p class="text-slate-500 font-medium">No notifications yet.</p>
            </div>
        @endforelse
    </div>

    @if ($notifications->hasPages())
        <div class="mt-6">{{ $notifications->links() }}</div>
    @endif
</x-layouts.admin>
