<x-layouts.admin :pageTitle="'New Notification'">
    <x-slot:title>New Notification</x-slot:title>

    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('admin.notifications.index') }}" class="text-slate-400 hover:text-slate-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <h2 class="text-2xl font-bold text-slate-800">New Notification</h2>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 max-w-2xl">
        <form action="{{ route('admin.notifications.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm" required>
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Message <span class="text-red-500">*</span></label>
                <textarea name="message" rows="4" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm" required>{{ old('message') }}</textarea>
                @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Type <span class="text-red-500">*</span></label>
                    <select name="type" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm" required>
                        @foreach(['info' => 'Info', 'success' => 'Success', 'warning' => 'Warning', 'alert' => 'Alert'] as $value => $label)
                            <option value="{{ $value }}" {{ old('type') === $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Link to Member (Optional)</label>
                    <select name="member_id" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm">
                        <option value="">— None —</option>
                        @foreach($members as $member)
                            <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                                {{ $member->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('member_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                <a href="{{ route('admin.notifications.index') }}" class="px-5 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-800 transition-colors">Cancel</a>
                <button type="submit" class="px-5 py-2.5 bg-orange-500 text-white text-sm font-medium rounded-xl hover:bg-orange-600 transition-colors">
                    Create Notification
                </button>
            </div>
        </form>
    </div>
</x-layouts.admin>
