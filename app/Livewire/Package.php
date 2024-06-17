<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Trip;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Package extends Component
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

    public $type_trips = 'packages';

    public $category_id;

    public $editId;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $packages = Trip::where('name', 'like', '%'.$this->search.'%')->where('type_trips', 'packages')->paginate(8);
        $categories = Category::where('key', 'packages')->get();

        return view('livewire.package', compact('packages', 'categories'))->layout('layouts.admin');
    }

    public function save()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:trips,slug'.($this->editId ? ','.$this->editId : ''),
            'day' => 'required|integer',
            'outstanding' => 'nullable|boolean',
            'first_email' => 'required',
            'second_email' => 'required',
            'type_trips' => 'required',
            'category_id' => 'required',
        ]);

        if ($this->editId) {
            $package = Trip::find($this->editId);
            $package->update($validatedData);
        } else {
            $this->create($validatedData);
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

        $package = Trip::findOrFail($id);
        $this->name = $package->name;
        $this->slug = $package->slug;
        $this->day = $package->day;
        $this->outstanding = (bool) $package->outstanding;
        $this->first_email = $package->first_email;
        $this->second_email = $package->second_email;
        $this->category_id = $package->category_id;
    }

    public function delete($id)
    {
        $package = Trip::findOrFail($id);

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
        $this->category_id = '';
    }
}
