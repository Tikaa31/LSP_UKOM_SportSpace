<?php

namespace App\Http\Controllers;

use App\Models\Venue;

class VenueController extends Controller
{
    public function show(Venue $venue)
    {
        return view('venues.show', compact('venue'));
    }
}