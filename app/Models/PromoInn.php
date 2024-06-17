<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoInn extends Model
{
    use HasFactory;

    protected $fillable = [

        'hotel_name',
        'duration_days_nights',
        'city',
        'adult_price_client',
        'child_price_client',
        'adult_price_provider',
        'child_price_provider',
        'stars',
        'trip_id',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
