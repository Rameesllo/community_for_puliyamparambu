<x-layouts.admin :pageTitle="isset($member) ? 'Edit Member' : 'Add Member'">
    <x-slot:title>{{ isset($member) ? 'Edit Member' : 'Add Member' }}</x-slot:title>

    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('admin.members.index') }}" class="text-slate-400 hover:text-slate-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <h2 class="text-2xl font-bold text-slate-800">{{ isset($member) ? 'Edit Member' : 'Add Member' }}</h2>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 max-w-3xl">
        <form action="{{ isset($member) ? route('admin.members.update', $member) : route('admin.members.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @if(isset($member))
                @method('PUT')
            @endif

            <div class="grid sm:grid-cols-2 gap-5">
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $member->name ?? '') }}" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm" required>
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Email (Optional)</label>
                    <input type="email" name="email" value="{{ old('email', $member->email ?? '') }}" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Phone (Optional)</label>
                    <input type="text" name="phone" value="{{ old('phone', $member->phone ?? '') }}" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm">
                    @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Education Level <span class="text-red-500">*</span></label>
                    <select name="education_level" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm" required>
                        @foreach(['Plus One', 'Plus Two', 'Undergraduate', 'Postgraduate', 'Diploma', 'Other'] as $level)
                            <option value="{{ $level }}" {{ old('education_level', $member->education_level ?? '') === $level ? 'selected' : '' }}>{{ $level }}</option>
                        @endforeach
                    </select>
                    @error('education_level') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Institution (Optional)</label>
                    <input type="text" name="institution" value="{{ old('institution', $member->institution ?? '') }}" placeholder="School or college name" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm">
                    @error('institution') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Skills (Optional)</label>
                    <textarea name="skills" rows="2" placeholder="e.g. Photography, Coding, Public Speaking" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm">{{ old('skills', $member->skills ?? '') }}</textarea>
                    @error('skills') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Date Joined <span class="text-red-500">*</span></label>
                    <input type="date" name="joined_at" value="{{ old('joined_at', isset($member) ? $member->joined_at->format('Y-m-d') : date('Y-m-d')) }}" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm" required>
                    @error('joined_at') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Profile Image (Optional)</label>
                    <input type="file" name="profile_image" accept="image/*" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 transition-all text-sm">
                    @if(isset($member) && $member->profile_image)
                        <div class="mt-2 flex items-center gap-2">
                            <img src="{{ Storage::url($member->profile_image) }}" class="w-10 h-10 rounded-full object-cover">
                            <span class="text-xs text-slate-400">Current image — upload a new one to replace</span>
                        </div>
                    @endif
                    @error('profile_image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <input type="checkbox" name="is_active" value="1"
                            class="w-4 h-4 rounded border-slate-300 text-orange-500 focus:ring-orange-400"
                            {{ old('is_active', $member->is_active ?? true) ? 'checked' : '' }}>
                        <span class="text-sm font-medium text-slate-700">Active Member</span>
                    </label>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                <a href="{{ route('admin.members.index') }}" class="px-5 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-800 transition-colors">Cancel</a>
                <button type="submit" class="px-5 py-2.5 bg-orange-500 text-white text-sm font-medium rounded-xl hover:bg-orange-600 transition-colors">
                    {{ isset($member) ? 'Update Member' : 'Save Member' }}
                </button>
            </div>
        </form>
    </div>
</x-layouts.admin>
