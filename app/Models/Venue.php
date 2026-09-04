<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}