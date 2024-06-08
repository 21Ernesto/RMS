<?php

namespace App\Livewire;

use App\Models\Category as CategoryModel;
use App\Models\Menu;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Category extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search;

    public $name;
    public $slug;
    public $image;
    public $key;
    public $menu_id;
    public $editId;

    protected $messages = [
        'menu_id.exists' => 'El menú seleccionado no es válido.',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $menus = Menu::where('status', 1)->get();
        $categories = CategoryModel::where('name', 'like', '%' . $this->search . '%')->paginate(8);
        return view('livewire.category', compact('categories', 'menus'))->layout('layouts.admin');
    }

    public function saveCategory()
    {
        $rules = [
            'name' => 'required|string',
            'slug' => 'required|string|unique:categories,slug' . ($this->editId ? ',' . $this->editId : ''),
            'key' => 'required|string|max:255',
            'image' => 'nullable|image',
            'menu_id' => 'required|exists:menus,id',
        ];

        $validatedData = $this->validate($rules, $this->messages);

        if ($this->image) {
            $this->deleteOldImage();
            $imageName = time() . '_' . Str::random(10) . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/categories', $imageName);
            $validatedData['image'] = 'storage/images/categories/' . $imageName;

            $this->image->delete();
        } elseif ($this->editId) {
            unset($validatedData['image']);
        }

        if ($this->editId) {
            $category = CategoryModel::find($this->editId);
            $category->update($validatedData);
        } else {
            CategoryModel::create($validatedData);
        }

        $this->resetForm();
    }

    private function deleteOldImage()
    {
        $category = CategoryModel::find($this->editId);
        if ($category && $category->image) {
            Storage::delete($category->image);
        }
    }

    public function edit($id)
    {
        $category = CategoryModel::findOrFail($id);
        $this->editId = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->key = $category->key;
        $this->menu_id = $category->menu_id;
        $this->image = null;
    }

    public function delete($id)
    {
        $package = CategoryModel::findOrFail($id);

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

    public function updatedName()
    {
        $this->slug = Str::slug($this->name);
    }

    private function resetForm()
    {
        $this->name = '';
        $this->slug = '';
        $this->image = '';
        $this->key = '';
        $this->menu_id = '';
    }
}
