<x-layouts.admin :pageTitle="'Team'">
    <x-slot:title>Team Management</x-slot:title>

    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Team Management</h2>
            <p class="text-slate-500 text-sm mt-1">Manage executive and extended committee members.</p>
        </div>
        <a href="{{ route('admin.team.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-500 text-white rounded-xl font-medium hover:bg-emerald-600 transition-colors">
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
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Role</th>
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Order</th>
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($members as $member)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-5 py-3.5">
                                <div class="flex items-center gap-3">
                                    @if($member->image)
                                        <img src="{{ Storage::url($member->image) }}" class="w-10 h-10 rounded-full object-cover">
                                    @else
                                        <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center text-slate-500 font-bold">
                                            {{ substr($member->name, 0, 2) }}
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-medium text-slate-800">{{ $member->name }}</div>
                                        <div class="text-xs text-slate-400 mt-0.5">{{ $member->email ?? 'No email' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-3.5 text-slate-700">
                                {{ $member->role }}
                            </td>
                            <td class="px-5 py-3.5 text-slate-700">
                                {{ $member->display_order }}
                            </td>
                            <td class="px-5 py-3.5">
                                @if($member->is_active)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700">Active</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600">Inactive</span>
                                @endif
                            </td>
                            <td class="px-5 py-3.5 text-right flex justify-end gap-2">
                                <a href="{{ route('admin.team.edit', $member) }}" class="text-blue-500 hover:text-blue-600 p-1">Edit</a>
                                <form action="{{ route('admin.team.destroy', $member) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this member?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600 p-1">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-8 text-center text-slate-500">
                                No team members found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin>
