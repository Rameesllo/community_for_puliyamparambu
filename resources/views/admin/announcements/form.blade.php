<x-layouts.admin :pageTitle="isset($announcement) ? 'Edit Announcement' : 'New Announcement'">
    <x-slot:title>{{ isset($announcement) ? 'Edit Announcement' : 'New Announcement' }}</x-slot:title>

    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('admin.announcements.index') }}" class="text-slate-400 hover:text-slate-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <h2 class="text-2xl font-bold text-slate-800">{{ isset($announcement) ? 'Edit Announcement' : 'New Announcement' }}</h2>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 max-w-3xl">
        <form action="{{ isset($announcement) ? route('admin.announcements.update', $announcement) : route('admin.announcements.store') }}" method="POST" class="space-y-5">
            @csrf
            @if(isset($announcement))
                @method('PUT')
            @endif

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $announcement->title ?? '') }}" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm" required>
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Content <span class="text-red-500">*</span></label>
                <textarea name="content" rows="8" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm" required>{{ old('content', $announcement->content ?? '') }}</textarea>
                @error('content') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="flex items-center gap-2 cursor-pointer select-none">
                    <input type="checkbox" name="is_published" value="1"
                        class="w-4 h-4 rounded border-slate-300 text-orange-500 focus:ring-orange-400"
                        {{ old('is_published', $announcement->is_published ?? false) ? 'checked' : '' }}>
                    <span class="text-sm font-medium text-slate-700">Publish immediately</span>
                </label>
                <p class="text-xs text-slate-400 mt-1 ml-6">Published announcements will be visible on the public announcements page.</p>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                <a href="{{ route('admin.announcements.index') }}" class="px-5 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-800 transition-colors">Cancel</a>
                <button type="submit" class="px-5 py-2.5 bg-orange-500 text-white text-sm font-medium rounded-xl hover:bg-orange-600 transition-colors">
                    {{ isset($announcement) ? 'Update Announcement' : 'Save Announcement' }}
                </button>
            </div>
        </form>
    </div>
</x-layouts.admin>
