<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentVerificationController extends Controller
{
    /**
     * Menampilkan daftar pembayaran yang menunggu verifikasi
     * atau bukti pembayarannya ditolak.
     */
    public function index()
    {
        $bookings = Booking::with(['user', 'venue'])
            ->whereIn('payment_status', [
                'waiting_verification',
                'rejected',
            ])
            ->latest()
            ->paginate(10);

        return view('admin.payments.index', compact('bookings'));
    }

    /**
     * Memverifikasi pembayaran dan mengonfirmasi booking.
     */
    public function verify(Booking $booking)
    {
        if ($booking->payment_status !== 'waiting_verification') {
            return back()->with(
                'error',
                'Pembayaran ini tidak sedang menunggu verifikasi.'
            );
        }

        if (!$booking->payment_proof) {
            return back()->with(
                'error',
                'Bukti pembayaran tidak ditemukan.'
            );
        }

        $booking->update([
            'payment_status' => 'paid',
            'status' => 'confirmed',
            'rejection_reason' => null,
        ]);

        return back()->with(
            'success',
            'Pembayaran berhasil diverifikasi. Booking telah dikonfirmasi dan pembayaran dinyatakan lunas.'
        );
    }

    /**
     * Menolak bukti pembayaran dengan alasan yang wajib diisi.
     */
    public function reject(Request $request, Booking $booking)
    {
        if ($booking->payment_status !== 'waiting_verification') {
            return back()->with(
                'error',
                'Pembayaran ini tidak sedang menunggu verifikasi.'
            );
        }

        if (!$booking->payment_proof) {
            return back()->with(
                'error',
                'Bukti pembayaran tidak ditemukan.'
            );
        }

        $validated = $request->validate([
            'rejection_reason' => [
                'required',
                'string',
                'max:1000',
            ],
        ]);

        $booking->update([
            'payment_status' => 'rejected',
            'rejection_reason' => $validated['rejection_reason'],
        ]);

        return back()->with(
            'success',
            'Bukti pembayaran berhasil ditolak. Alasan penolakan telah disimpan.'
        );
    }
}
