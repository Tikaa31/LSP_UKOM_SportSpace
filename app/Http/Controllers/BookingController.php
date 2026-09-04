<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Venue;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Venue $venue)
    {
        return view('bookings.create', compact('venue'));
    }

    public function store(Request $request, Venue $venue)
    {
        $request->validate([
            'booking_date' => 'required|date',
            'start_time' => 'required',
            'duration' => 'required|integer|min:1',
        ]);

        $endTime = date(
            'H:i',
            strtotime(
                $request->start_time . ' +' . $request->duration . ' hours'
            )
        );

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'venue_id' => $venue->id,
            'booking_date' => $request->booking_date,
            'start_time' => $request->start_time,
            'end_time' => $endTime,
            'duration' => $request->duration,
            'total_price' => $venue->price_per_hour * $request->duration,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.success', [
            'booking' => $booking->id,
        ]);
    }

    public function success(Booking $booking)
    {
        return view('bookings.success', compact('booking'));
    }

    public function index()
    {
    $bookings = Booking::where('user_id', auth()->id())
        ->with('venue')
        ->latest()
        ->get();

    return view('bookings.index', compact('bookings'));
    }

    public function orders()
    {
    $bookings = Booking::with('venue')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('bookings.orders', compact('bookings'));
    }
    
    public function show(Booking $booking)
    {
    if ($booking->user_id !== auth()->id()) {
        abort(403);
    }

    $booking->load('venue');

    return view('bookings.show', compact('booking'));
    }
    
}