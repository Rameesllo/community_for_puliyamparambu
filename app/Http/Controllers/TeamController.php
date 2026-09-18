<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function index(): View
    {
        $teamMembers = TeamMember::where('is_active', true)
                                 ->orderBy('display_order', 'asc')
                                 ->get();
                                 
        return view('team', compact('teamMembers'));
    }
}
