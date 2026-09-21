<x-layouts.admin :pageTitle="isset($member) ? 'Edit Member' : 'Add Member'">
    <x-slot:title>{{ isset($member) ? 'Edit Member' : 'Add Member' }}</x-slot:title>

    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('admin.team.index') }}" class="text-slate-400 hover:text-slate-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <h2 class="text-2xl font-bold text-slate-800">{{ isset($member) ? 'Edit Member' : 'Add Member' }}</h2>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 max-w-3xl">
        <form action="{{ isset($member) ? route('admin.team.update', ['team' => $member]) : route('admin.team.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @if(isset($member))
                @method('PUT')
            @endif

            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', $member->name ?? '') }}" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all text-sm" required>
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Role / Position</label>
                    <input type="text" name="role" value="{{ old('role', $member->role ?? '') }}" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all text-sm" required placeholder="e.g. Founder, President, Coordinator">
                    @error('role') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Section</label>
                    <select name="section" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all text-sm" required>
                        <option value="founders" {{ old('section', $member->section ?? 'team') === 'founders' ? 'selected' : '' }}>Founders</option>
                        <option value="team" {{ old('section', $member->section ?? 'team') === 'team' ? 'selected' : '' }}>Team</option>
                        <option value="alumni" {{ old('section', $member->section ?? 'team') === 'alumni' ? 'selected' : '' }}>Alumni</option>
                    </select>
                    @error('section') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Short Bio (Optional)</label>
                    <textarea name="bio" rows="3" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all text-sm">{{ old('bio', $member->bio ?? '') }}</textarea>
                    @error('bio') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Email Address (Optional)</label>
                    <input type="email" name="email" value="{{ old('email', $member->email ?? '') }}" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all text-sm">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Phone (Optional)</label>
                    <input type="text" name="phone" value="{{ old('phone', $member->phone ?? '') }}" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all text-sm">
                    @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">LinkedIn Profile URL (Optional)</label>
                    <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $member->linkedin_url ?? '') }}" placeholder="https://linkedin.com/in/username" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all text-sm">
                    @error('linkedin_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Instagram Profile URL (Optional)</label>
                    <input type="url" name="instagram_url" value="{{ old('instagram_url', $member->instagram_url ?? '') }}" placeholder="https://instagram.com/username" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all text-sm">
                    @error('instagram_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Display Order</label>
                    <input type="number" name="display_order" value="{{ old('display_order', $member->display_order ?? 0) }}" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all text-sm" required>
                    <p class="text-xs text-slate-400 mt-1">Lower numbers appear first.</p>
                    @error('display_order') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center mt-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', isset($member) ? $member->is_active : true) ? 'checked' : '' }} class="w-4 h-4 text-emerald-500 rounded border-slate-300 focus:ring-emerald-500">
                        <span class="text-sm font-medium text-slate-700">Active (Visible on public page)</span>
                    </label>
                </div>

                <div class="sm:col-span-2 mt-2">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Profile Image</label>
                    @if(isset($member) && $member->image && is_numeric($member->image))
                        <div class="mb-3">
                            <img src="{{ route('file.show', $member->image) }}" class="w-20 h-20 rounded-full object-cover border border-slate-200">
                        </div>
                    @endif
                    <input type="file" name="image" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                    <p class="text-xs text-slate-400 mt-1">Leave empty to keep existing image. Max size: 10MB.</p>
                    @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end gap-3 mt-6">
                <a href="{{ route('admin.team.index') }}" class="px-5 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-800 transition-colors">Cancel</a>
                <button type="submit" class="px-5 py-2.5 bg-emerald-500 text-white text-sm font-medium rounded-xl hover:bg-emerald-600 transition-colors">
                    {{ isset($member) ? 'Update Member' : 'Save Member' }}
                </button>
            </div>
        </form>
    </div>
</x-layouts.admin>
