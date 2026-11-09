<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'user_id',
        'amount',
        'reason',
        'status',
        'admin_note',
        'processed_by',
        'requested_at',
        'processed_at',
        'refunded_at',

        // Informasi tujuan pengembalian dana
        'refund_method',
        'account_name',
        'bank_name',
        'account_number',

        // Bukti dan referensi transfer dari admin
        'transfer_proof_path',
        'transfer_reference',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'requested_at' => 'datetime',
        'processed_at' => 'datetime',
        'refunded_at' => 'datetime',
    ];

    /**
     * Booking yang diajukan untuk refund.
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * Pengguna yang mengajukan refund.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Admin yang memproses refund.
     */
    public function processor()
    {
        return $this->belongsTo(User::class, 'processed_by');
    }
}
