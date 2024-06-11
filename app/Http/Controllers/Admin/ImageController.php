<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function index($trip)
    {
        $trip = Trip::findOrFail($trip);
        $images = Image::all();
        return view('admin.image.image-complement', compact('images', 'trip'));
    }
    

    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|image',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Image::create([
            'trip_id' => $request->trip_id,
            'image' => 'images/' . $imageName,
        ]);

        return redirect()->back();
        
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        if (File::exists(public_path($image->image))) {
            File::delete(public_path($image->image));
        }

        $image->delete();

        return redirect()->back();
    }
}
