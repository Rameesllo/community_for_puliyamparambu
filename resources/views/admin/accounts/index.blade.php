<x-layouts.admin :pageTitle="'Admin Accounts'">
    <x-slot:title>Admin Accounts</x-slot:title>

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Admin Accounts</h2>
        <p class="text-slate-500 text-sm mt-1">View and manage admin accounts and their roles. Only ADMINs can access this section.</p>
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

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 text-left">
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Admin</th>
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Role</th>
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider hidden sm:table-cell">Joined</th>
                        <th class="px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($admins as $admin)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-5 py-3.5">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                                        {{ substr($admin->name, 0, 2) }}
                                    </div>
                                    <div>
                                        <div class="font-medium text-slate-800">
                                            {{ $admin->name }}
                                            @if($admin->id === auth('admin')->id())
                                                <span class="ml-1 text-xs text-slate-400">(you)</span>
                                            @endif
                                        </div>
                                        <div class="text-xs text-slate-400">{{ $admin->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-3.5">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                                    {{ $admin->role === 'ADMIN' ? 'bg-orange-100 text-orange-700' : 'bg-blue-100 text-blue-700' }}">
                                    {{ $admin->role }}
                                </span>
                            </td>
                            <td class="px-5 py-3.5 hidden sm:table-cell text-slate-500 text-xs">
                                {{ $admin->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-5 py-3.5 text-right">
                                @if($admin->id !== auth('admin')->id())
                                    <a href="{{ route('admin.accounts.edit-role', $admin) }}"
                                       class="text-blue-500 hover:text-blue-600 text-xs font-medium transition-colors">
                                        Change Role
                                    </a>
                                @else
                                    <span class="text-xs text-slate-300">—</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6 p-4 bg-amber-50 border border-amber-200 rounded-xl">
        <p class="text-sm text-amber-700">
            <strong>Role guide:</strong>
            <span class="ml-2"><strong>ADMIN</strong> — Full access including admin accounts and roles.</span>
            <span class="ml-3"><strong>MANAGER</strong> — Can manage Events, Team, Members and Announcements.</span>
        </p>
    </div>
</x-layouts.admin>
