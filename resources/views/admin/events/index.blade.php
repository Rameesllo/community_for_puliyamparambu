<x-layouts.admin :pageTitle="'Events'">
    <x-slot:title>Events Management</x-slot:title>

    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Events Management</h2>
            <p class="text-slate-500 text-sm mt-1">Create, edit, and manage community events.</p>
        </div>
        <a href="{{ route('admin.events.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-orange-500 text-white rounded-xl font-medium hover:bg-orange-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Create Event
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
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Event Details</th>
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Date & Time</th>
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($events as $event)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-5 py-3.5">
                                <div class="font-medium text-slate-800">{{ $event->title }}</div>
                                <div class="text-xs text-slate-400 mt-0.5">{{ $event->location }}</div>
                            </td>
                            <td class="px-5 py-3.5">
                                <div class="text-slate-700">{{ $event->date->format('M d, Y') }}</div>
                                <div class="text-xs text-slate-400 mt-0.5">{{ \Carbon\Carbon::parse($event->time)->format('g:i A') }}</div>
                            </td>
                            <td class="px-5 py-3.5">
                                @php
                                    $statusColors = [
                                        'Confirmed' => 'bg-emerald-100 text-emerald-700',
                                        'Open'      => 'bg-blue-100 text-blue-700',
                                        'Draft'     => 'bg-amber-100 text-amber-700',
                                        'Cancelled' => 'bg-red-100 text-red-600',
                                    ];
                                    $color = $statusColors[$event->status] ?? 'bg-slate-100 text-slate-600';
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $color }}">
                                    {{ $event->status }}
                                </span>
                            </td>
                            <td class="px-5 py-3.5 text-right flex justify-end gap-2">
                                <a href="{{ route('admin.events.edit', $event) }}" class="text-blue-500 hover:text-blue-600 p-1">Edit</a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600 p-1">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-8 text-center text-slate-500">
                                No events found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin>
