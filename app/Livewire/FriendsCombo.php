<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Trip;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class FriendsCombo extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search;

    public $name;
    public $slug;
   
    
    public $day;
    public $outstanding = false;
    public $first_email;
    public $second_email;
    public $price;
    public $price_real;
    public $type_trips = 'friendscombos';
    public $category_id;
    public $editId;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $friendCombos = Trip::where('name', 'like', '%' . $this->search . '%')->where('type_trips', 'friendscombos')->paginate(8);
        $categories = Category::where('key', 'friendscombos')->get();

        return view('livewire.friends-combo', compact('friendCombos', 'categories'))->layout('layouts.admin');
    }

    public function save()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:trips,slug' . ($this->editId ? ',' . $this->editId : ''),
            
            
            'day' => 'required|integer',
            'outstanding' => 'nullable|boolean',
            'first_email' => 'required',
            'second_email' => 'required',
            'price' => 'required',
            'price_real' => 'required',
            'type_trips' => 'required',
            'category_id' => 'required',
        ]);

        

        

        if ($this->editId) {
            $this->update($validatedData);
        } else {
            $this->create($validatedData);
        }

        $this->resetForm();
    }

    private function create($data)
    {
        Trip::create($data);
    }

    private function update($data)
    {
        $friendsCombo = Trip::findOrFail($this->editId);
        $friendsCombo->update($data);
    }

    public function edit($id)
    {
        $this->editId = $id;

        $friendsCombo = Trip::findOrFail($id);
        $this->name = $friendsCombo->name;
        $this->slug = $friendsCombo->slug;
        
        
        $this->day = $friendsCombo->day;
        $this->outstanding = (bool) $friendsCombo->outstanding;
        $this->first_email = $friendsCombo->first_email;
        $this->second_email = $friendsCombo->second_email;
        $this->price = $friendsCombo->price;
        $this->price_real = $friendsCombo->price_real;
        $this->category_id = $friendsCombo->category_id;
    }

    public function delete($id)
    {
        $friendsCombo = Trip::findOrFail($id);

        

        $friendsCombo->delete();
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
    }

    

    
}
