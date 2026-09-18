<x-layouts.admin :pageTitle="'Change Role'">
    <x-slot:title>Change Role — {{ $admin->name }}</x-slot:title>

    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('admin.accounts.index') }}" class="text-slate-400 hover:text-slate-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <h2 class="text-2xl font-bold text-slate-800">Change Role — {{ $admin->name }}</h2>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 max-w-md">
        <div class="mb-5 p-4 bg-slate-50 rounded-xl">
            <div class="text-sm text-slate-500 mb-1">Current role</div>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                {{ $admin->role === 'ADMIN' ? 'bg-orange-100 text-orange-700' : 'bg-blue-100 text-blue-700' }}">
                {{ $admin->role }}
            </span>
        </div>

        <form action="{{ route('admin.accounts.update-role', $admin) }}" method="POST" class="space-y-5">
            @csrf
            @method('PATCH')

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-3">New Role</label>
                <div class="space-y-3">
                    @foreach(\App\Models\Admin::roles() as $role)
                        <label class="flex items-start gap-3 p-4 rounded-xl border cursor-pointer hover:border-orange-300 transition-colors
                            {{ old('role', $admin->role) === $role ? 'border-orange-400 bg-orange-50' : 'border-slate-200' }}">
                            <input type="radio" name="role" value="{{ $role }}"
                                class="mt-0.5 text-orange-500 focus:ring-orange-400"
                                {{ old('role', $admin->role) === $role ? 'checked' : '' }}>
                            <div>
                                <div class="font-semibold text-slate-800 text-sm">{{ $role }}</div>
                                <div class="text-xs text-slate-500 mt-0.5">
                                    @if($role === 'ADMIN') Full access — events, team, members, announcements, notifications, and admin accounts.
                                    @else Manage community content (events, team, members, announcements, notifications) only.
                                    @endif
                                </div>
                            </div>
                        </label>
                    @endforeach
                </div>
                @error('role') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                <a href="{{ route('admin.accounts.index') }}" class="px-5 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-800 transition-colors">Cancel</a>
                <button type="submit" class="px-5 py-2.5 bg-orange-500 text-white text-sm font-medium rounded-xl hover:bg-orange-600 transition-colors">
                    Update Role
                </button>
            </div>
        </form>
    </div>
</x-layouts.admin>
