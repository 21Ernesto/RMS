<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageDelivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_name',
        'days_nights',
        'city',
        'provider_simple',
        'provider_double',
        'provider_triple',
        'provider_quadruple',
        'provider_children_under_10',

        'client_simple',
        'client_double',
        'client_triple',
        'client_quadruple',
        'client_children_under_10',

        'stars',
        'trip_id',
    ];


    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function saleDeliveries()
    {
        return $this->hasMany(SaleDelivery::class);
    }
    
}
