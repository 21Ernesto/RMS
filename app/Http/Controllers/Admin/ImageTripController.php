<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageTripController extends Controller
{
    public function edit(Trip $trip)
    {
        return view('admin.image.trip', compact('trip'));
    }

    public function update(Request $request, $trip)
    {
        $trip = Trip::findOrFail($trip);

        $validatedData = $request->validate([
            'front_page' => 'nullable|image',
            'banner' => 'nullable|image',
        ]);

        if ($request->hasFile('front_page')) {
            if (File::exists(public_path($trip->front_page))) {
                File::delete(public_path($trip->front_page));
            }
            $front_pageName = 'trip_'.time().'.'.$request->front_page->extension();
            $request->file('front_page')->move(public_path('images/front_pages'), $front_pageName);
            $validatedData['front_page'] = 'images/front_pages/'.$front_pageName;
        }

        if ($request->hasFile('banner')) {
            if (File::exists(public_path($trip->banner))) {
                File::delete(public_path($trip->banner));
            }
            $bannerName = 'trip_'.time().'.'.$request->banner->extension();
            $request->file('banner')->move(public_path('images/banners'), $bannerName);
            $validatedData['banner'] = 'images/banners/'.$bannerName;
        }

        $trip->update($validatedData);

        return redirect()->back();
    }
}
