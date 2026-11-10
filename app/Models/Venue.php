<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
use App\Models\Sport;
use App\Models\VenueMaintenance;

class Venue extends Model
{
    protected $fillable = [
        'name',
        'location',
        'sport_id',
        'price_per_hour',
        'rating',
        'image',
    ];

    /**
     * Relasi ke jenis olahraga.
     */
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    /**
     * Relasi ke seluruh booking milik lapangan ini.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Relasi ke data maintenance milik lapangan ini.
     */
    public function maintenances()
    {
        return $this->hasMany(VenueMaintenance::class);
    }
}
