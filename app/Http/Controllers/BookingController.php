<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Venue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    public function create(Venue $venue)
    {
        return view('bookings.create', compact('venue'));
    }

    public function store(Request $request, Venue $venue)
    {
        $validated = $request->validate([
            'booking_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'duration' => 'required|integer|min:1|max:24',
        ]);

        $duration = (int) $validated['duration'];
        $startTime = $validated['start_time'];

        $start = Carbon::createFromFormat('H:i', $startTime);
        $end = $start->copy()->addHours($duration);

        if ($end->format('Y-m-d') !== $start->format('Y-m-d')) {
            return back()->withInput()->withErrors([
                'start_time' => 'Booking tidak boleh melewati tengah malam.',
            ]);
        }

        $endTime = $end->format('H:i:s');

        $overlapExists = Booking::where('venue_id', $venue->id)
            ->whereDate('booking_date', $validated['booking_date'])
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($startTime, $endTime) {
                $query->where('start_time', '<', $endTime)
                    ->where('end_time', '>', $startTime);
            })
            ->exists();

        if ($overlapExists) {
            return back()->withInput()->withErrors([
                'start_time' => 'Jadwal lapangan sudah dipesan pada waktu tersebut. Silakan pilih jam lain.',
            ]);
        }

        $booking = DB::transaction(function () use (
            $validated,
            $venue,
            $startTime,
            $endTime,
            $duration
        ) {
            return Booking::create([
                'user_id' => auth()->id(),
                'venue_id' => $venue->id,
                'booking_date' => $validated['booking_date'],
                'start_time' => $startTime,
                'end_time' => $endTime,
                'duration' => $duration,
                'total_price' => $venue->price_per_hour * $duration,
                'status' => 'pending',
                'payment_method' => 'qris',
                'payment_status' => 'unpaid',
            ]);
        });

        return redirect()->route('bookings.success', [
            'booking' => $booking->id,
        ]);
    }

    public function success(Booking $booking)
    {
        abort_unless(
            (int) $booking->user_id === (int) auth()->id(),
            403
        );

        $booking->load('venue');

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
        $bookings = Booking::where('user_id', auth()->id())
            ->with('venue')
            ->latest()
            ->get();

        return view('bookings.orders', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        abort_unless(
            (int) $booking->user_id === (int) auth()->id(),
            403
        );

        $booking->load('venue');

        return view('bookings.show', compact('booking'));
    }

    /**
     * Membatalkan booking.
     */
    public function cancel(Booking $booking)
    {
        abort_unless(
            (int) $booking->user_id === (int) auth()->id(),
            403
        );

        $result = DB::transaction(function () use ($booking) {
            $currentBooking = Booking::whereKey($booking->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ((int) $currentBooking->user_id !== (int) auth()->id()) {
                return [
                    'success' => false,
                    'message' => 'Kamu tidak memiliki akses ke booking ini.',
                ];
            }

            if ($currentBooking->status === 'cancelled') {
                return [
                    'success' => false,
                    'message' => 'Booking ini sudah dibatalkan sebelumnya.',
                ];
            }

            $startAt = Carbon::parse($currentBooking->booking_date)
                ->setTimeFromTimeString($currentBooking->start_time);

            $now = now();

            if ($currentBooking->payment_status === 'paid') {
                if (!in_array(
                    $currentBooking->status,
                    ['pending', 'confirmed'],
                    true
                )) {
                    return [
                        'success' => false,
                        'message' => 'Status booking ini tidak mengizinkan pembatalan.',
                    ];
                }

                if (!$now->lt($startAt->copy()->subHours(24))) {
                    return [
                        'success' => false,
                        'message' => 'Booking yang sudah dibayar hanya dapat dibatalkan lebih dari 24 jam sebelum jadwal dimulai.',
                    ];
                }
            } else {
                if ($currentBooking->status !== 'pending') {
                    return [
                        'success' => false,
                        'message' => 'Status booking ini tidak mengizinkan pembatalan.',
                    ];
                }

                if (!in_array(
                    $currentBooking->payment_status,
                    ['unpaid', 'waiting_verification', 'rejected'],
                    true
                )) {
                    return [
                        'success' => false,
                        'message' => 'Status pembayaran tidak mengizinkan pembatalan.',
                    ];
                }

                if (!$now->lt($startAt)) {
                    return [
                        'success' => false,
                        'message' => 'Booking tidak dapat dibatalkan setelah jadwal dimulai.',
                    ];
                }
            }

            $currentBooking->update([
                'status' => 'cancelled',
            ]);

            return [
                'success' => true,
                'message' => $currentBooking->payment_status === 'paid'
                    ? 'Booking dibatalkan. Silakan ajukan refund melalui halaman Refund Saya.'
                    : 'Booking berhasil dibatalkan.',
            ];
        });

        if (!$result['success']) {
            return redirect()
                ->route('bookings.show', $booking->id)
                ->with('error', $result['message']);
        }

        return redirect()
            ->route('bookings.index')
            ->with('success', $result['message']);
    }

    /**
     * Menghapus booking yang sudah dibatalkan,
     * belum dibayar, dan tidak memiliki pengajuan refund.
     */
    public function destroy(Booking $booking)
    {
        abort_unless(
            (int) $booking->user_id === (int) auth()->id(),
            403
        );

        $result = DB::transaction(function () use ($booking) {
            $currentBooking = Booking::whereKey($booking->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ((int) $currentBooking->user_id !== (int) auth()->id()) {
                abort(403);
            }

            if ($currentBooking->status !== 'cancelled') {
                return [
                    'success' => false,
                    'message' => 'Hanya booking yang sudah dibatalkan yang dapat dihapus.',
                ];
            }

            if ($currentBooking->payment_status === 'paid') {
                return [
                    'success' => false,
                    'message' => 'Transaksi sudah dibayar. Riwayat harus dipertahankan untuk proses refund.',
                ];
            }

            if ($currentBooking->refund()->exists()) {
                return [
                    'success' => false,
                    'message' => 'Booking memiliki riwayat refund sehingga tidak dapat dihapus.',
                ];
            }

            $currentBooking->delete();

            return [
                'success' => true,
                'message' => 'Transaksi yang dibatalkan berhasil dihapus.',
            ];
        });

        if (!$result['success']) {
            return redirect()
                ->route('bookings.index')
                ->with('error', $result['message']);
        }

        return redirect()
            ->route('bookings.index')
            ->with('success', $result['message']);
    }

    /**
     * Mengunggah bukti pembayaran QRIS.
     */
    public function uploadPaymentProof(
        Request $request,
        Booking $booking
    ) {
        abort_unless(
            (int) $booking->user_id === (int) auth()->id(),
            403
        );

        if ($booking->payment_status === 'paid') {
            return back()->with(
                'error',
                'Pembayaran pesanan ini sudah diverifikasi.'
            );
        }

        if ($booking->status === 'cancelled') {
            return back()->with(
                'error',
                'Pesanan yang dibatalkan tidak dapat menerima pembayaran.'
            );
        }

        $request->validate([
            'payment_proof' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        $path = $request->file('payment_proof')
            ->store('payment-proofs', 'public');

        if (!$path) {
            return back()->with(
                'error',
                'Bukti pembayaran gagal diunggah. Silakan coba lagi.'
            );
        }

        if ($booking->payment_proof) {
            Storage::disk('public')->delete($booking->payment_proof);
        }

        $booking->update([
            'payment_method' => 'qris',
            'payment_proof' => $path,
            'payment_status' => 'waiting_verification',
        ]);

        return redirect()
            ->route('bookings.show', $booking->id)
            ->with(
                'success',
                'Bukti pembayaran berhasil diunggah. Silakan tunggu verifikasi admin.'
            );
    }
}
