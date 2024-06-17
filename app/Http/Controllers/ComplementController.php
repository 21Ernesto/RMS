<?php

namespace App\Http\Controllers;

use App\Models\Trip;

class ComplementController extends Controller
{
    public function show(Trip $trip)
    {
        return view('admin.complement', compact('trip'));
    }
}
