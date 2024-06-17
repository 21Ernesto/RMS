<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Trip;

class TripController extends Controller
{
    public function show($slug)
    {
        $trip = Trip::where('slug', $slug)->with([
            'itineraries', 'messages', 'includes', 'excludeds',
            'recommendations', 'notes', 'suggestions', 'schedules',
            'highSeasons', 'lowSeasons', 'foods', 'images',
        ])->firstOrFail();
        $menus = Menu::where('status', 1)->get();

        return view('public.details', compact('trip', 'menus'));
    }
}
