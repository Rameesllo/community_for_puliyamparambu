<x-layouts.admin :pageTitle="'Announcements'">
    <x-slot:title>Announcements Management</x-slot:title>

    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Announcements</h2>
            <p class="text-slate-500 text-sm mt-1">Create and publish announcements to the community.</p>
        </div>
        <a href="{{ route('admin.announcements.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-orange-500 text-white rounded-xl font-medium hover:bg-orange-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            New Announcement
        </a>
    </div>

    @if (session('status'))
        <div class="mb-4 bg-emerald-500/10 border border-emerald-400/25 rounded-xl px-4 py-3 flex items-center gap-2">
            <p class="text-emerald-600 text-sm font-medium">{{ session('status') }}</p>
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 text-left">
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Title</th>
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider hidden sm:table-cell">Published At</th>
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($announcements as $announcement)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-5 py-3.5">
                                <div class="font-medium text-slate-800">{{ $announcement->title }}</div>
                                <div class="text-xs text-slate-400 mt-0.5 line-clamp-1">{{ Str::limit($announcement->content, 80) }}</div>
                            </td>
                            <td class="px-5 py-3.5 hidden sm:table-cell text-slate-500">
                                {{ $announcement->published_at?->format('M d, Y · g:i A') ?? '—' }}
                            </td>
                            <td class="px-5 py-3.5">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $announcement->is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                    {{ $announcement->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </td>
                            <td class="px-5 py-3.5 text-right">
                                <div class="flex justify-end items-center gap-2">
                                    {{-- Toggle publish --}}
                                    <form action="{{ route('admin.announcements.toggle-publish', $announcement) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-xs {{ $announcement->is_published ? 'text-amber-500 hover:text-amber-600' : 'text-emerald-500 hover:text-emerald-600' }} font-medium transition-colors">
                                            {{ $announcement->is_published ? 'Unpublish' : 'Publish' }}
                                        </button>
                                    </form>
                                    <a href="{{ route('admin.announcements.edit', $announcement) }}" class="text-blue-500 hover:text-blue-600 p-1">Edit</a>
                                    <form action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST" onsubmit="return confirm('Delete this announcement?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-600 p-1">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-8 text-center text-slate-500">
                                No announcements yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin>
