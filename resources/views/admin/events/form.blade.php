<x-layouts.admin :pageTitle="isset($event) ? 'Edit Event' : 'Create Event'">
    <x-slot:title>{{ isset($event) ? 'Edit Event' : 'Create Event' }}</x-slot:title>

    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('admin.events.index') }}" class="text-slate-400 hover:text-slate-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <h2 class="text-2xl font-bold text-slate-800">{{ isset($event) ? 'Edit Event' : 'Create Event' }}</h2>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 max-w-3xl">
        <form action="{{ isset($event) ? route('admin.events.update', $event) : route('admin.events.store') }}" method="POST" class="space-y-5">
            @csrf
            @if(isset($event))
                @method('PUT')
            @endif

            <div class="grid sm:grid-cols-2 gap-5">
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Event Title</label>
                    <input type="text" name="title" value="{{ old('title', $event->title ?? '') }}" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm" required>
                    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Description</label>
                    <textarea name="description" rows="4" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm" required>{{ old('description', $event->description ?? '') }}</textarea>
                    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Date</label>
                    <input type="date" name="date" value="{{ old('date', isset($event) ? $event->date->format('Y-m-d') : '') }}" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm" required>
                    @error('date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Time</label>
                    <input type="time" name="time" value="{{ old('time', isset($event) ? \Carbon\Carbon::parse($event->time)->format('H:i') : '') }}" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm" required>
                    @error('time') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Location / Venue</label>
                    <input type="text" name="location" value="{{ old('location', $event->location ?? '') }}" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm" required>
                    @error('location') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Status</label>
                    <select name="status" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm" required>
                        @foreach(['Draft', 'Open', 'Confirmed', 'Cancelled'] as $status)
                            <option value="{{ $status }}" {{ old('status', $event->status ?? '') === $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                    @error('status') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Meeting Link (Optional)</label>
                    <input type="url" name="meeting_link" value="{{ old('meeting_link', $event->meeting_link ?? '') }}" placeholder="https://" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-sm">
                    @error('meeting_link') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                <a href="{{ route('admin.events.index') }}" class="px-5 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-800 transition-colors">Cancel</a>
                <button type="submit" class="px-5 py-2.5 bg-orange-500 text-white text-sm font-medium rounded-xl hover:bg-orange-600 transition-colors">
                    {{ isset($event) ? 'Update Event' : 'Save Event' }}
                </button>
            </div>
        </form>
    </div>
</x-layouts.admin>
