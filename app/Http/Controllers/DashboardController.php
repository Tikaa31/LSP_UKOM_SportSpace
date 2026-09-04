<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Models\Venue;

class DashboardController extends Controller
{
    public function index()
    {
        $sports = Sport::all();

        $venues = Venue::where('is_active', true)
            ->orderByDesc('rating')
            ->get();

        return view('dashboard', compact('sports', 'venues'));
    }
}