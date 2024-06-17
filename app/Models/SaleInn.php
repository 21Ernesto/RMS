<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleInn extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'payment_id',
        'trip_name',
        'quantity',
        'price',
        'price_real',
        'datestart',
        'type_trips',
        'currency',
        'customer_name',
        'customer_email',
        'payment_method',
        'payment_status',
        'total',
        'total_real',
    ];
}
