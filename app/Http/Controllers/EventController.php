<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index(): View
    {
        $today = Carbon::today();
        
        $upcomingEvents = Event::whereIn('status', ['Open', 'Confirmed'])
                               ->where('date', '>=', $today)
                               ->orderBy('date', 'asc')
                               ->orderBy('time', 'asc')
                               ->get();
                               
        $pastEvents = Event::where('status', 'Confirmed')
                           ->where('date', '<', $today)
                           ->orderBy('date', 'desc')
                           ->get();

        return view('events', compact('upcomingEvents', 'pastEvents'));
    }
}
