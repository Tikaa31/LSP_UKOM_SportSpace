<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Venue;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'date' => ['nullable', 'date', 'after_or_equal:today'],
            'venue_id' => ['nullable', 'integer', 'exists:venues,id'],
        ]);

        $date = $validated['date'] ?? now()->toDateString();

        $venues = Venue::where('is_active', 1)
            ->orderBy('name')
            ->get();

        $selectedVenue = $venues->firstWhere(
            'id',
            (int) ($validated['venue_id'] ?? 0)
        );

        if (!$selectedVenue) {
            $selectedVenue = $venues->first();
        }

        $bookings = collect();

        if ($selectedVenue) {
            $bookings = Booking::where('venue_id', $selectedVenue->id)
                ->whereDate('booking_date', $date)
                ->whereIn('status', ['pending', 'confirmed'])
                ->orderBy('start_time')
                ->get();
        }

        // Pilihan jam mengikuti halaman Booking SPORTSPACE.
        $jamTersedia = [
            '08:00',
            '10:00',
            '12:00',
            '14:00',
            '16:00',
            '18:00',
            '20:00',
            '21:00',
            '22:00',
        ];

        $slots = [];

        foreach ($jamTersedia as $jam) {
            $waktuSlot = Carbon::parse($date . ' ' . $jam);

            $sudahLewat = $date === now()->toDateString()
                && $waktuSlot->lessThanOrEqualTo(now());

            $bookingSlot = $bookings->first(function ($booking) use ($date, $jam) {
                $mulaiBooking = Carbon::parse(
                    $date . ' ' . $booking->start_time
                );

                $selesaiBooking = Carbon::parse(
                    $date . ' ' . $booking->end_time
                );

                $mulaiSlot = Carbon::parse($date . ' ' . $jam);
                $selesaiSlot = $mulaiSlot->copy()->addHour();

                return $mulaiSlot->lt($selesaiBooking)
                    && $selesaiSlot->gt($mulaiBooking);
            });

            $slots[] = [
                'time' => $jam,
                'available' => !$sudahLewat && !$bookingSlot,
                'past' => $sudahLewat,
                'booking' => $bookingSlot,
            ];
        }

        return view('jadwal.index', [
            'venues' => $venues,
            'selectedVenue' => $selectedVenue,
            'date' => $date,
            'bookings' => $bookings,
            'slots' => $slots,
        ]);
    }
}
