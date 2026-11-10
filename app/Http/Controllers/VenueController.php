<?php

namespace App\Http\Controllers;

use App\Models\Venue;

class VenueController extends Controller
{
    public function show(Venue $venue)
    {
        $venue->load('maintenances');

        return view('venues.show', compact('venue'));
    }
}