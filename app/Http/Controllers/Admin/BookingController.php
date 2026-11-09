<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        // Statistik booking
        $totalBookings = Booking::count();

        $pendingBookings = Booking::where(
            'status',
            'pending'
        )->count();

        $confirmedBookings = Booking::where(
            'status',
            'confirmed'
        )->count();

        $completedBookings = Booking::where(
            'status',
            'completed'
        )->count();

        // Query data booking beserta pengguna dan lapangan
        $query = Booking::with(['user', 'venue'])
            ->latest();

        // Pencarian nama, email, atau lapangan
        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                })->orWhereHas('venue', function ($venueQuery) use ($search) {
                    $venueQuery->where('name', 'like', "%{$search}%");
                });
            });
        }

        // Filter status booking
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter status pembayaran
        if ($request->filled('payment_status')) {
            $query->where(
                'payment_status',
                $request->payment_status
            );
        }

        // Pagination tetap membawa filter yang dipilih
        $bookings = $query
            ->paginate(10)
            ->withQueryString();

        return view('admin.bookings.index', compact(
            'bookings',
            'totalBookings',
            'pendingBookings',
            'confirmedBookings',
            'completedBookings'
        ));
    }
}
