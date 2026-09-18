<x-layouts.admin :pageTitle="'Members'">
    <x-slot:title>Members Management</x-slot:title>

    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Members Management</h2>
            <p class="text-slate-500 text-sm mt-1">Add, edit, and manage community members.</p>
        </div>
        <a href="{{ route('admin.members.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-orange-500 text-white rounded-xl font-medium hover:bg-orange-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add Member
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
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Member</th>
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider hidden sm:table-cell">Education</th>
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider hidden md:table-cell">Joined</th>
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($members as $member)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-5 py-3.5">
                                <div class="flex items-center gap-3">
                                    @if($member->profile_image)
                                        <img src="{{ Storage::url($member->profile_image) }}" class="w-9 h-9 rounded-full object-cover flex-shrink-0">
                                    @else
                                        <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-400 to-blue-700 flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                                            {{ substr($member->name, 0, 2) }}
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-medium text-slate-800">{{ $member->name }}</div>
                                        <div class="text-xs text-slate-400 mt-0.5">{{ $member->email ?? $member->phone ?? '—' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-3.5 hidden sm:table-cell">
                                <div class="text-slate-700">{{ $member->education_level }}</div>
                                <div class="text-xs text-slate-400 mt-0.5">{{ $member->institution ?? '—' }}</div>
                            </td>
                            <td class="px-5 py-3.5 hidden md:table-cell text-slate-600">
                                {{ $member->joined_at->format('M d, Y') }}
                            </td>
                            <td class="px-5 py-3.5">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $member->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $member->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-5 py-3.5 text-right">
                                <div class="flex justify-end items-center gap-2">
                                    {{-- Toggle active --}}
                                    <form action="{{ route('admin.members.toggle-active', $member) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-xs {{ $member->is_active ? 'text-amber-500 hover:text-amber-600' : 'text-emerald-500 hover:text-emerald-600' }} font-medium transition-colors">
                                            {{ $member->is_active ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </form>
                                    <a href="{{ route('admin.members.edit', $member) }}" class="text-blue-500 hover:text-blue-600 p-1">Edit</a>
                                    <form action="{{ route('admin.members.destroy', $member) }}" method="POST" onsubmit="return confirm('Delete this member?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-600 p-1">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-8 text-center text-slate-500">
                                No members found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin>
