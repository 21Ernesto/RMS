<?php

namespace App\Http\Controllers;

use App\Models\CarGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarGalleryController extends Controller
{
    public function index()
    {
        $carGalleries = CarGallery::all();

        return view('admin.cars.index', compact('carGalleries'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image',
        ]);

        if ($request->hasFile('image')) {
            $imageName = 'car_'.time().'.'.$request->image->extension();
            $request->file('image')->move(public_path('images/car_galleries'), $imageName);
            $validatedData['image'] = 'images/car_galleries/'.$imageName;
        }

        CarGallery::create($validatedData);

        return redirect()->route('cars.index');
    }

    public function edit($id)
    {
        $carGallery = CarGallery::findOrFail($id);

        return view('admin.cars.edit', compact('carGallery'));
    }

    public function update(Request $request, $id)
    {
        $carGallery = CarGallery::findOrFail($id);

        $validatedData = $request->validate([
            'image' => 'sometimes|image',
        ]);

        if ($request->hasFile('image')) {
            if (File::exists(public_path($carGallery->image))) {
                File::delete(public_path($carGallery->image));
            }

            $imageName = 'car_'.time().'.'.$request->image->extension();
            $request->file('image')->move(public_path('images/car_galleries'), $imageName);
            $validatedData['image'] = 'images/car_galleries/'.$imageName;
        }

        $carGallery->update($validatedData);

        return redirect()->route('cars.index');
    }

    public function destroy($id)
    {
        $carGallery = CarGallery::findOrFail($id);

        if (File::exists(public_path($carGallery->image))) {
            File::delete(public_path($carGallery->image));
        }

        $carGallery->delete();

        return redirect()->route('cars.index');
    }
}
