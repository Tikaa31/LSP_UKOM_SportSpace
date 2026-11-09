<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Refund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RefundController extends Controller
{
    public function index()
    {
        $refunds = Refund::with([
            'booking.venue',
            'user',
            'processor',
        ])->latest()->get();

        return view('admin.refunds.index', compact('refunds'));
    }

    public function approve(Request $request, Refund $refund)
    {
        $validated = $request->validate([
            'admin_note' => ['nullable', 'string', 'max:2000'],
        ]);

        $result = DB::transaction(function () use ($refund, $validated) {
            $currentRefund = Refund::whereKey($refund->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($currentRefund->status !== 'pending') {
                return [
                    'success' => false,
                    'message' => 'Hanya pengajuan refund berstatus menunggu yang dapat disetujui.',
                ];
            }

            $currentRefund->update([
                'status' => 'approved',
                'admin_note' => $validated['admin_note'] ?? null,
                'processed_by' => auth()->id(),
                'processed_at' => now(),
            ]);

            return [
                'success' => true,
                'message' => 'Refund disetujui. Silakan lakukan transfer dan unggah bukti setelah dana dikirim.',
            ];
        });

        return redirect()
            ->route('admin.refunds.index')
            ->with($result['success'] ? 'success' : 'error', $result['message']);
    }

    public function reject(Request $request, Refund $refund)
    {
        $validated = $request->validate([
            'admin_note' => ['required', 'string', 'min:3', 'max:2000'],
        ], [
            'admin_note.required' => 'Alasan penolakan wajib diisi.',
            'admin_note.min' => 'Alasan penolakan minimal 3 karakter.',
        ]);

        $result = DB::transaction(function () use ($refund, $validated) {
            $currentRefund = Refund::whereKey($refund->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($currentRefund->status !== 'pending') {
                return [
                    'success' => false,
                    'message' => 'Hanya pengajuan refund berstatus menunggu yang dapat ditolak.',
                ];
            }

            $currentRefund->update([
                'status' => 'rejected',
                'admin_note' => $validated['admin_note'],
                'processed_by' => auth()->id(),
                'processed_at' => now(),
            ]);

            return [
                'success' => true,
                'message' => 'Pengajuan refund berhasil ditolak.',
            ];
        });

        return redirect()
            ->route('admin.refunds.index')
            ->with($result['success'] ? 'success' : 'error', $result['message']);
    }

    public function markRefunded(Request $request, Refund $refund)
    {
        $validated = $request->validate([
            'transfer_proof' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,webp,pdf',
                'max:5120',
            ],
            'transfer_reference' => [
                'nullable',
                'string',
                'max:150',
            ],
        ], [
            'transfer_proof.required' => 'Bukti transfer wajib diunggah.',
            'transfer_proof.mimes' => 'Bukti harus berupa JPG, PNG, WEBP, atau PDF.',
            'transfer_proof.max' => 'Ukuran bukti transfer maksimal 5 MB.',
        ]);

        $currentRefund = Refund::findOrFail($refund->id);

        if ($currentRefund->status !== 'approved') {
            return redirect()
                ->route('admin.refunds.index')
                ->with('error', 'Hanya refund yang disetujui yang dapat diselesaikan.');
        }

        $proofPath = $validated['transfer_proof']
            ->store('refund-proofs', 'local');

        try {
            DB::transaction(function () use ($currentRefund, $validated, $proofPath) {
                $lockedRefund = Refund::whereKey($currentRefund->id)
                    ->lockForUpdate()
                    ->firstOrFail();

                if ($lockedRefund->status !== 'approved') {
                    throw new \RuntimeException(
                        'Status refund telah berubah. Silakan muat ulang halaman.'
                    );
                }

                $lockedRefund->update([
                    'status' => 'refunded',
                    'transfer_proof_path' => $proofPath,
                    'transfer_reference' => $validated['transfer_reference'] ?? null,
                    'processed_by' => auth()->id(),
                    'refunded_at' => now(),
                    'processed_at' => $lockedRefund->processed_at ?? now(),
                ]);
            });
        } catch (\Throwable $exception) {
            Storage::disk('local')->delete($proofPath);

            if ($exception instanceof \RuntimeException) {
                return redirect()
                    ->route('admin.refunds.index')
                    ->with('error', $exception->getMessage());
            }

            throw $exception;
        }

        return redirect()
            ->route('admin.refunds.index')
            ->with('success', 'Bukti transfer berhasil disimpan dan refund telah diselesaikan.');
    }
}
