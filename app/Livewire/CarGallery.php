<?php

namespace App\Livewire;

use App\Models\CarGallery as ModelsCarGallery;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CarGallery extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $search;

    public $image;
    public $editId = null;

    public $trip;

    public function render()
    {
        $images = ModelsCarGallery::paginate(10);
        return view('livewire.car-gallery', compact('images'))->layout('layouts.admin');
    }

    public function save()
    {

        $rules = [
            'image' => 'required',
        ];

        $validatedData = $this->validate($rules);

        if ($this->image) {
            $this->deleteOldImage();
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/cars', $imageName);
            $validatedData['image'] = 'storage/images/cars/' . $imageName;
            $this->image->delete();
        } elseif ($this->editId) {
            unset($validatedData['image']);
        }

        if ($this->editId) {
            $image = ModelsCarGallery::find($this->editId);
            $image->update($validatedData);
        } else {
            ModelsCarGallery::create($validatedData);
        }

        $this->resetForm();
    }

    private function deleteOldImage()
    {
        $image = ModelsCarGallery::find($this->editId);
        if ($image && $image->image) {
            Storage::delete($image->image);
        }
    }

    public function edit($id)
    {
        $image = ModelsCarGallery::findOrFail($id);
        $this->editId = $image->id;
        $this->image = null;
    }

    public function delete($id)
    {
        $package = ModelsCarGallery::findOrFail($id);

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
    }
}
