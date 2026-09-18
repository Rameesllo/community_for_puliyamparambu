<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnnouncementController extends Controller
{
    public function index(): View
    {
        $announcements = Announcement::orderByDesc('created_at')->get();

        return view('admin.announcements.index', compact('announcements'));
    }

    public function create(): View
    {
        return view('admin.announcements.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $validated['is_published'] ? now() : null;

        Announcement::create($validated);

        return redirect()->route('admin.announcements.index')->with('status', 'Announcement created successfully!');
    }

    public function edit(Announcement $announcement): View
    {
        return view('admin.announcements.form', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $isPublished = $request->has('is_published');

        // Set published_at only when first publishing
        if ($isPublished && ! $announcement->is_published) {
            $validated['published_at'] = now();
        } elseif (! $isPublished) {
            $validated['published_at'] = null;
        }

        $validated['is_published'] = $isPublished;

        $announcement->update($validated);

        return redirect()->route('admin.announcements.index')->with('status', 'Announcement updated successfully!');
    }

    public function destroy(Announcement $announcement): RedirectResponse
    {
        $announcement->delete();

        return redirect()->route('admin.announcements.index')->with('status', 'Announcement deleted successfully!');
    }

    public function togglePublish(Announcement $announcement): RedirectResponse
    {
        $isPublished = ! $announcement->is_published;
        $announcement->update([
            'is_published' => $isPublished,
            'published_at' => $isPublished ? ($announcement->published_at ?? now()) : null,
        ]);
        $label = $isPublished ? 'published' : 'unpublished';

        return redirect()->route('admin.announcements.index')->with('status', "Announcement {$label} successfully!");
    }
}
