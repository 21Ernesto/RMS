<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Trip;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Tour extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search;

    public $name;

    public $slug;

    public $day;

    public $outstanding = false;

    public $first_email;

    public $second_email;

    public $price;

    public $price_real;

    public $type_trips = 'tour';

    public $category_id;

    public $editId;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $tours = Trip::where('name', 'like', '%'.$this->search.'%')->where('type_trips', 'tour')->paginate(8);
        $categories = Category::where('key', 'tour')->get();

        return view('livewire.tour', compact('tours', 'categories'))->layout('layouts.admin');
    }

    public function save()
    {
        $rules = [
            'name' => 'required|string',
            'slug' => 'required|string|unique:trips,slug'.($this->editId ? ','.$this->editId : ''),
            'day' => 'required|integer',

            'outstanding' => 'nullable|boolean',
            'first_email' => 'required',
            'second_email' => 'required',
            'price' => 'required',
            'price_real' => 'required',
            'type_trips' => 'required',
            'category_id' => 'required',
        ];

        $validatedData = $this->validate($rules);

        if ($this->editId) {
            $tour = Trip::find($this->editId);
            $tour->update($validatedData);
        } else {
            Trip::create($validatedData);
        }

        $this->resetForm();
    }

    private function create($data)
    {
        Trip::create($data);
    }

    public function edit($id)
    {
        $this->editId = $id;

        $tour = Trip::findOrFail($id);
        $this->name = $tour->name;
        $this->slug = $tour->slug;

        $this->day = $tour->day;
        $this->outstanding = (bool) $tour->outstanding;
        $this->first_email = $tour->first_email;
        $this->second_email = $tour->second_email;
        $this->price = $tour->price;
        $this->price_real = $tour->price_real;
        $this->type_trips = $tour->type_trips;
        $this->category_id = $tour->category_id;
    }

    public function delete($id)
    {
        $package = Trip::findOrFail($id);

        if ($package->front_page) {
            $frontPagePath = public_path($package->front_page);
            if (file_exists($frontPagePath)) {
                unlink($frontPagePath);
            }
        }

        if ($package->banner) {
            $bannerPath = public_path($package->banner);
            if (file_exists($bannerPath)) {
                unlink($bannerPath);
            }
        }

        $package->delete();
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    public function updatedName()
    {
        $this->slug = Str::slug($this->name);
    }

    private function resetForm()
    {
        $this->name = '';
        $this->slug = '';

        $this->day = '';
        $this->outstanding = false;
        $this->first_email = '';
        $this->second_email = '';
        $this->price = '';
        $this->price_real = '';
        $this->category_id = '';
        $this->editId = null;
    }
}
