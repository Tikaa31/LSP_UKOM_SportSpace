<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Venue;
use App\Models\Sport;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBookings = Booking::count();

        $confirmedBookings = Booking::where('status', 'confirmed')->count();

        $pendingBookings = Booking::where('status', 'pending')->count();

        $cancelledBookings = Booking::where('status', 'cancelled')->count();

        $completedBookings = Booking::where('status', 'completed')->count();

        $totalVenues = Venue::count();

        $activeVenues = Venue::where('is_active', 1)->count();

        $totalSports = Sport::count();

        $paidBookings = Booking::where('payment_status', 'paid')->count();

        $unpaidBookings = Booking::where('payment_status', 'unpaid')->count();

        $rejectedPayments = Booking::where('payment_status', 'rejected')->count();

        $latestBookings = Booking::with(['user', 'venue'])
            ->latest()
            ->take(6)
            ->get();

        $popularVenues = Venue::withCount('bookings')
            ->orderByDesc('bookings_count')
            ->take(5)
            ->get();

        $bookingChart = Booking::select(
                DB::raw('DATE(created_at) as tanggal'),
                DB::raw('COUNT(*) as jumlah')
            )
            ->where('created_at', '>=', now()->subDays(6)->startOfDay())
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('tanggal')
            ->get()
            ->keyBy('tanggal');

        $chartLabels = [];
        $chartValues = [];

        for ($i = 6; $i >= 0; $i--) {
            $tanggal = now()->subDays($i)->toDateString();

            $chartLabels[] = now()->subDays($i)->format('d M');

            $chartValues[] = (int) ($bookingChart[$tanggal]->jumlah ?? 0);
        }

        return view('admin.dashboard', compact(
            'totalBookings',
            'confirmedBookings',
            'pendingBookings',
            'cancelledBookings',
            'completedBookings',
            'totalVenues',
            'activeVenues',
            'totalSports',
            'paidBookings',
            'unpaidBookings',
            'rejectedPayments',
            'latestBookings',
            'popularVenues',
            'chartLabels',
            'chartValues'
        ));
    }
}
