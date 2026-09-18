<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function index(): View
    {
        $members = TeamMember::orderBy('display_order', 'asc')->get();
        return view('admin.team.index', compact('members'));
    }

    public function create(): View
    {
        return view('admin.team.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // Max 2MB image
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'display_order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('team', 'public');
        }

        TeamMember::create($validated);

        return redirect()->route('admin.team.index')->with('status', 'Team member added successfully!');
    }

    public function edit(TeamMember $teamMember): View
    {
        // Renaming variable for view consistency
        $member = $teamMember;
        return view('admin.team.form', compact('member'));
    }

    public function update(Request $request, TeamMember $teamMember): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'display_order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($teamMember->image) {
                Storage::disk('public')->delete($teamMember->image);
            }
            $validated['image'] = $request->file('image')->store('team', 'public');
        }

        $teamMember->update($validated);

        return redirect()->route('admin.team.index')->with('status', 'Team member updated successfully!');
    }

    public function destroy(TeamMember $teamMember): RedirectResponse
    {
        if ($teamMember->image) {
            Storage::disk('public')->delete($teamMember->image);
        }
        $teamMember->delete();
        
        return redirect()->route('admin.team.index')->with('status', 'Team member deleted successfully!');
    }
}
