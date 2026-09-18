<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $events = Event::orderBy('date', 'desc')->orderBy('time', 'desc')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create(): View
    {
        return view('admin.events.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string|max:255',
            'meeting_link' => 'nullable|url|max:255',
            'status' => 'required|in:Draft,Open,Confirmed,Cancelled',
        ]);

        Event::create($validated);

        return redirect()->route('admin.events.index')->with('status', 'Event created successfully!');
    }

    public function edit(Event $event): View
    {
        return view('admin.events.form', compact('event'));
    }

    public function update(Request $request, Event $event): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string|max:255',
            'meeting_link' => 'nullable|url|max:255',
            'status' => 'required|in:Draft,Open,Confirmed,Cancelled',
        ]);

        $event->update($validated);

        return redirect()->route('admin.events.index')->with('status', 'Event updated successfully!');
    }

    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('status', 'Event deleted successfully!');
    }
}
