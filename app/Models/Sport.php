<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    public function venues()
    {
        return $this->hasMany(Venue::class);
    }
}
