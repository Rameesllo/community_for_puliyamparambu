<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberController extends Controller
{
    public function __construct(protected ImageService $imageService) {}

    public function index(): View
    {
        $members = Member::orderByDesc('joined_at')->get();

        return view('admin.members.index', compact('members'));
    }

    public function create(): View
    {
        return view('admin.members.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:members,email',
            'phone' => 'nullable|string|max:30',
            'education_level' => 'required|string|max:255',
            'institution' => 'nullable|string|max:255',
            'skills' => 'nullable|string',
            'joined_at' => 'required|date',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
            $file = $this->imageService->compressAndStore($request->file('profile_image'));
            $validated['profile_image'] = $file->id;
        }

        Member::create($validated);

        return redirect()->route('admin.members.index')->with('status', 'Member added successfully!');
    }

    public function edit(Member $member): View
    {
        return view('admin.members.form', compact('member'));
    }

    public function update(Request $request, Member $member): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:members,email,'.$member->id,
            'phone' => 'nullable|string|max:30',
            'education_level' => 'required|string|max:255',
            'institution' => 'nullable|string|max:255',
            'skills' => 'nullable|string',
            'joined_at' => 'required|date',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
            // Delete old image from database first
            $this->imageService->deleteById((string) $member->profile_image);
            // Compress and store new image
            $file = $this->imageService->compressAndStore($request->file('profile_image'));
            $validated['profile_image'] = $file->id;
        }

        $member->update($validated);

        return redirect()->route('admin.members.index')->with('status', 'Member updated successfully!');
    }

    public function destroy(Member $member): RedirectResponse
    {
        $this->imageService->deleteById((string) $member->profile_image);
        $member->delete();

        return redirect()->route('admin.members.index')->with('status', 'Member deleted successfully!');
    }

    public function toggleActive(Member $member): RedirectResponse
    {
        $member->update(['is_active' => ! $member->is_active]);
        $label = $member->is_active ? 'activated' : 'deactivated';

        return redirect()->route('admin.members.index')->with('status', "Member {$label} successfully!");
    }
}
