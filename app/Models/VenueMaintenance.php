<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VenueMaintenance extends Model
{
    protected $fillable = ['venue_id', 'start_date', 'end_date', 'reason', 'status'];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}
