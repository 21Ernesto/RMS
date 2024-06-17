<?php

namespace App\Http\Controllers;

use App\Models\Trip;

class PackageDeliveryController extends Controller
{
    public function show(Trip $trip)
    {
        return view('admin.packagedelivery', compact('trip'));
    }
}
