<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Refund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RefundController extends Controller
{
    /**
     * Menampilkan booking yang dapat diajukan refund
     * dan riwayat refund milik pengguna.
     */
    public function index()
    {
        $userId = auth()->id();

        $eligibleBookings = Booking::with('venue')
            ->where('user_id', $userId)
            ->where('status', 'cancelled')
            ->where('payment_status', 'paid')
            ->whereDoesntHave('refund')
            ->latest()
            ->get();

        $refunds = Refund::with('booking.venue')
            ->where('user_id', $userId)
            ->latest()
            ->get();

        return view('refunds.index', [
            'bookings' => $eligibleBookings,
            'eligibleBookings' => $eligibleBookings,
            'refunds' => $refunds,
        ]);
    }

    /**
     * Mengajukan refund untuk booking yang memenuhi syarat.
     */
    public function store(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'reason' => [
                'required',
                'string',
                'min:10',
                'max:2000',
            ],
            'refund_method' => [
                'required',
                'in:bank_transfer,e_wallet',
            ],
            'account_name' => [
                'required',
                'string',
                'max:150',
            ],
            'bank_name' => [
                'required',
                'string',
                'max:100',
            ],
            'account_number' => [
                'required',
                'string',
                'max:100',
            ],
        ], [
            'reason.required' =>
                'Alasan pengajuan refund wajib diisi.',
            'reason.min' =>
                'Alasan refund minimal 10 karakter.',
            'refund_method.required' =>
                'Pilih metode penerimaan refund.',
            'account_name.required' =>
                'Nama pemilik rekening wajib diisi.',
            'bank_name.required' =>
                'Nama bank atau penyedia e-wallet wajib diisi.',
            'account_number.required' =>
                'Nomor rekening atau akun wajib diisi.',
        ]);

        $result = DB::transaction(function () use (
            $booking,
            $validated
        ) {
            $currentBooking = Booking::whereKey($booking->id)
                ->lockForUpdate()
                ->firstOrFail();

            // Pastikan booking milik pengguna yang sedang login.
            if (
                (int) $currentBooking->user_id
                !== (int) auth()->id()
            ) {
                abort(403);
            }

            // Refund hanya untuk booking yang sudah dibayar dan dibatalkan.
            if (
                $currentBooking->status !== 'cancelled'
                || $currentBooking->payment_status !== 'paid'
            ) {
                return [
                    'success' => false,
                    'message' =>
                        'Refund hanya dapat diajukan untuk booking yang sudah dibayar dan dibatalkan.',
                ];
            }

            // Cegah pengajuan refund ganda.
            if (
                Refund::where(
                    'booking_id',
                    $currentBooking->id
                )->exists()
            ) {
                return [
                    'success' => false,
                    'message' =>
                        'Booking ini sudah memiliki pengajuan refund.',
                ];
            }

            Refund::create([
                'booking_id' => $currentBooking->id,
                'user_id' => auth()->id(),
                'amount' => $currentBooking->total_price,
                'reason' => $validated['reason'],
                'refund_method' => $validated['refund_method'],
                'account_name' => $validated['account_name'],
                'bank_name' => $validated['bank_name'],
                'account_number' => $validated['account_number'],
                'status' => 'pending',
                'requested_at' => now(),
            ]);

            return [
                'success' => true,
                'message' =>
                    'Pengajuan refund berhasil dikirim. Silakan tunggu keputusan admin.',
            ];
        });

        return redirect()
            ->route('refunds.index')
            ->with(
                $result['success'] ? 'success' : 'error',
                $result['message']
            );
    }

    /**
     * Menampilkan bukti transfer refund langsung di browser.
     * Hanya pemilik pengajuan refund yang dapat mengaksesnya.
     */
    public function proof(Refund $refund)
    {
        // Pastikan refund milik pengguna yang sedang login.
        abort_unless(
            (int) $refund->user_id === (int) auth()->id(),
            403
        );

        // Bukti hanya tersedia jika refund selesai dan file tercatat.
        abort_unless(
            $refund->status === 'refunded'
            && filled($refund->transfer_proof_path),
            404
        );

        $disk = Storage::disk('local');
        $path = $refund->transfer_proof_path;

        // Pastikan file benar-benar ada.
        abort_unless($disk->exists($path), 404);

        $filePath = $disk->path($path);
        $extension = strtolower(
            pathinfo($path, PATHINFO_EXTENSION)
        );

        // Tentukan tipe file yang boleh ditampilkan.
        $contentType = match ($extension) {
            'jpg', 'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'webp' => 'image/webp',
            'pdf' => 'application/pdf',
            default => abort(
                415,
                'Format bukti transfer tidak didukung.'
            ),
        };

        // Kirim file langsung ke browser, bukan sebagai unduhan.
        return response()->file($filePath, [
            'Content-Type' => $contentType,
            'Content-Disposition' => 'inline',
            'X-Content-Type-Options' => 'nosniff',
            'Cache-Control' => 'private, no-store',
        ]);
    }
}
