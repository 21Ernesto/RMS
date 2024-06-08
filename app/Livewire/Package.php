<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Trip;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Package extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $search;

    public $name;
    public $slug;
    public $front_page;
    public $banner;
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
        $packages = Trip::where('name', 'like', '%' . $this->search . '%')->where('type_trips', 'packages')->paginate(8);
        $categories = Category::where('key', 'packages')->get();

        return view('livewire.package', compact('packages', 'categories'))->layout('layouts.admin');
    }

    public function save()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:trips,slug' . ($this->editId ? ',' . $this->editId : ''),
            'front_page' => 'nullable|image',
            'banner' => 'nullable|image',
            'day' => 'required|integer',
            'outstanding' => 'nullable|boolean',
            'first_email' => 'required',
            'second_email' => 'required',
            'type_trips' => 'required',
            'category_id' => 'required',
        ]);
        if ($this->front_page) {
            $this->deleteOldFrontPage();
            $frontPageName = time() . '.' . $this->front_page->getClientOriginalExtension();
            $this->front_page->storeAs('public/images/front_pages', $frontPageName);
            $validatedData['front_page'] = 'storage/images/front_pages/' . $frontPageName;

            $this->front_page->delete();
        } elseif ($this->editId) {
            unset($validatedData['front_page']);
        }

        if ($this->banner) {
            $this->deleteOldBanner();
            $bannerName = time() . '.' . $this->banner->getClientOriginalExtension();
            $this->banner->storeAs('public/images/banners', $bannerName);
            $validatedData['banner'] = 'storage/images/banners/' . $bannerName;
            $this->banner->delete();
        } elseif ($this->editId) {
            unset($validatedData['banner']);
        }
        
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
        $this->front_page = null;
        $this->banner = null;
        $this->day = $package->day;
        $this->outstanding = (bool) $package->outstanding;
        $this->first_email = $package->first_email;
        $this->second_email = $package->second_email;
        $this->category_id = $package->category_id;
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
        $this->front_page = '';
        $this->banner = '';
        $this->day = '';
        $this->outstanding = false;
        $this->first_email = '';
        $this->second_email = '';
        $this->category_id = '';
    }

    private function deleteOldFrontPage()
    {
        if ($this->editId) {
            $oldFrontPage = Trip::findOrFail($this->editId)->front_page;
            if ($oldFrontPage) {
                unlink(public_path($oldFrontPage));
            }
        }
    }

    private function deleteOldBanner()
    {
        if ($this->editId) {
            $oldBanner = Trip::findOrFail($this->editId)->banner;
            if ($oldBanner) {
                unlink(public_path($oldBanner));
            }
        }
    }
}
