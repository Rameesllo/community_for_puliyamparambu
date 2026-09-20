<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function __construct(protected ImageService $imageService) {}

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
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'display_order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $this->imageService->compressAndStore($request->file('image'));
            $validated['image'] = $file->id;
        }

        TeamMember::create($validated);

        return redirect()->route('admin.team.index')->with('status', 'Team member added successfully!');
    }

    public function edit(TeamMember $teamMember): View
    {
        $member = $teamMember;

        return view('admin.team.form', compact('member'));
    }

    public function update(Request $request, TeamMember $teamMember): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'display_order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Delete old image from database first
            $this->imageService->deleteById((string) $teamMember->image);
            // Compress and store new image
            $file = $this->imageService->compressAndStore($request->file('image'));
            $validated['image'] = $file->id;
        }

        $teamMember->update($validated);

        return redirect()->route('admin.team.index')->with('status', 'Team member updated successfully!');
    }

    public function destroy(TeamMember $teamMember): RedirectResponse
    {
        $this->imageService->deleteById((string) $teamMember->image);
        $teamMember->delete();

        return redirect()->route('admin.team.index')->with('status', 'Team member deleted successfully!');
    }
}
