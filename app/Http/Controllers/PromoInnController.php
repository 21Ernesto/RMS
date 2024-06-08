<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class PromoInnController extends Controller
{
    public function show(Trip $trip)
    {
        return view('admin.promoinn', compact('trip'));
    }
}
