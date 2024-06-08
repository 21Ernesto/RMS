<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class ComplementController extends Controller
{
    public function show(Trip $trip)
    {
        return view('admin.complement', compact('trip'));
    }
}
