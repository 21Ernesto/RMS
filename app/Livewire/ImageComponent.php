<?php

namespace App\Livewire;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ImageComponent extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $search;

    public $image;
    public $trip_id;
    public $editId = null;

    public $trip;

    public function render()
    {
        $this->trip_id = $this->trip->id;
        $images = Image::where('trip_id', $this->trip->id)->paginate(10);
        return view('livewire.image-component', compact('images'));
    }

    public function save    ()
    {

        $rules = [
            'image' => 'required',
            'trip_id' => 'required|exists:trips,id',
        ];

        $validatedData = $this->validate($rules);

        if ($this->image) {
            $this->deleteOldImage();
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/trip', $imageName);
            $validatedData['image'] = 'storage/images/trip/' . $imageName;
            $this->image->delete();
        } elseif ($this->editId) {
            unset($validatedData['image']);
        }

        if ($this->editId) {
            $image = Image::find($this->editId);
            $image->update($validatedData);
        } else {
            Image::create($validatedData);
        }

        $this->resetForm();
    }

    private function deleteOldImage()
    {
        $image = Image::find($this->editId);
        if ($image && $image->image) {
            Storage::delete($image->image);
        }
    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);
        $this->editId = $image->id;
        $this->image = null;
    }

    public function delete($id)
    {
        $package = Image::findOrFail($id);

        if ($package->image) {
            $frontPagePath = public_path($package->image);
            if (file_exists($frontPagePath)) {
                unlink($frontPagePath);
            }
        }

        $package->delete();
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->image = '';
        $this->trip_id = '';
    }
}
